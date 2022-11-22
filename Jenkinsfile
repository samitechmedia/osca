// Documentation: https://www.jenkins.io/doc/book/pipeline/jenkinsfile/

// Define branch name to check if staging or master
// set ecrBranch
def branchName = BRANCH_NAME;
def ecrBranch = "prod";
// Split the branch name for staging-1/staging-2 etc
if (branchName != 'master') {
    branchName = branchName.split('/')[-1];
    ecrBranch = branchName.replaceAll("-", "");
}

// define the pipeline start
pipeline {
    agent any
    // set options (such as logs to keep etc)
    options {
        buildDiscarder(logRotator(numToKeepStr: '5', artifactNumToKeepStr: '5'))
    }
    // set up local vars used across file
    environment {
        SITE_NAME="onlineslots.ca";
        PREFIX="osca"
        LOCAL_BRANCH="${branchName}";
        ECR_BRANCH="${ecrBranch}";
        gitCommit="${env.GIT_COMMIT}"
        dockerImageTag="${BUILD_NUMBER}-${gitCommit}"
        deploymentSiteName="onlineslots-ca"
        managerHost="10.0.1.101"
        ARCADE_TOOL_CONTAINER_NAME="osca-arcade-build-container"
        sitemap_project_name="sitemap_${SITE_NAME}"
        ecrImageReference="253271932012.dkr.ecr.eu-west-2.amazonaws.com/${SITE_NAME}:${ECR_BRANCH}-${dockerImageTag}"
    }
    // define stages
    stages {
        stage('Create staging workspace dir') {
            when { not { branch "master" } }
            environment {
                site="centralhosting_${LOCAL_BRANCH}.onlineslots.ca"
                site_path="/var/lib/jenkins/workspace/site_${site}"
                site_dockerize_path="${WORKSPACE}/.dockerize"
            }
            steps {
                sh label: "Create workspace dir", script: 'mkdir -p ${site_dockerize_path}', returnStatus: true
            }
        }
        stage('Create production workspace dir') {
            when { branch "master" }
            environment {
                site="onlineslots.ca"
                site_path="/var/lib/jenkins/workspace/site_${site}"
                site_dockerize_path="${WORKSPACE}/.dockerize"
            }
            steps {
                sh label: "Create workspace dir", script: 'mkdir -p ${site_dockerize_path}', returnStatus: true
            }
        }
        // Build application parent stage
        stage('Build Application') {
            stages {
                // Fetch CodeLibrary and add excluded files
                stage('Setup CodeLibrary') {
                    steps {
                        echo('Fetching CodeLibrary')
                        sh label: 'Copy CodeLibrary', script: '''
                            rsync -auvtP \
                            --exclude=.git \
                            --exclude=Models/AffiliateLinkSystem/AffiliateLinkSystemArray.php \
                            --exclude=ThirdParty/Tools/XmlSitemaps \
                            --exclude=Models/AffiliateLinkSystem/AffiliateLinkSystemClickyFilesArray.php \
                            --exclude=Settings.php \
                            --exclude=SettingsWinnerFeeds.php \
                            --exclude=Php/Views/BreadcrumbSystem \
                            --exclude=Php/Views/CentraliseSystem \
                            /var/lib/jenkins/workspace/tool_codelibrary/* ./CodeLibrary/
                        '''
                    }
                }

                // Set up Free Games Images dir and copy tools
                stage('Setup Free Games Images') {
                    steps {
                        echo('Make free games dir')
                        sh label: 'Create dir', script: '''
                            mkdir -p ./resources/free_games/uploads
                        '''
                        echo('Copy tools from workspace')
                        sh label: 'Copy Tools', script: '''
                            rsync -auvtP --exclude=.git /var/lib/jenkins/workspace/tool_freegames_images/Optimised/* ./resources/free_games/uploads
                        '''
                    }
                }

                // Setup Arcade Folders/Resources
                // Original Jenkins config script
                stage('Setup Arcade folders and resources') {
                    steps {
                        echo('Setup folders')
                        sh label: 'Create dir', script: '''
                            mkdir -p ./_arcade/images/games
                        '''
                        echo('Copy Arcade images')
                        sh label: 'Copy Tools', script: '''
                            sudo rsync -avutP --chown=www-data:www-data --exclude=.git --exclude=.gitattributes /var/lib/jenkins/workspace/tool_arcade_images/* ./_arcade/images/games/
                        '''
                    }
                }

                // Stop docker containers and build tools container
                stage('Stop and Pull Tools container') {
                    steps {
                        echo('Remove Container being created')
                        sh label: 'Remove containers', script: '''
                            docker stop ${ARCADE_TOOL_CONTAINER_NAME} || true;
                            docker rm ${ARCADE_TOOL_CONTAINER_NAME}  || true;
                            docker pull roundrobintreegenerator/tools;

                            jenkinsUserId=$(id -u jenkins);
                            jenkinsGroupId=$(id -g jenkins);
                            rm -rf "${WORKSPACE}/_arcade/dist/"
                        '''
                    }   
                }

                // Create a shell script to run in tools docker container
                stage('Create setup script to run in temp docker container') {
                    steps {
                        writeFile file: "${WORKSPACE}/_arcade/src/execute.sh", text: """
                            #!/bin/bash
                            eval \$(ssh-agent -s);
                            ssh-add /tmp/id_rsa;
                            echo "StrictHostKeyChecking no" > /etc/ssh/ssh_config;
                            cd ./_arcade/src/;
                            rm -Rf node_modules;
                            npm install;
                            npm run build;
                        """
                        sh label: 'Set script permissions', script: '''
                            chmod +x "${WORKSPACE}/_arcade/src/execute.sh";
                        '''
                    }
                }

                // Write new Arcade ENV Credentials
                stage('Create Arcade API Credentials') {
                    steps {
                        writeFile file: "${WORKSPACE}/_arcade/src/.env.production.local", text: """
                            VUE_APP_ARCADE_CLIENT_ID=8
                            VUE_APP_ARCADE_CLIENT_SECRET=--78-made-READ-rolled-00--
                            VUE_APP_ARCADE_SERVER=https://arcade.onlineslots.ca/
                            VUE_APP_ARCADE_API_PORT=80
                            VUE_APP_ARCADE_API_PATH=
                            VUE_APP_IMAGE_PATH=/_arcade/images
                            VUE_APP_DARKROOM_IMAGES=https://www.onlineslots.ca/x-slot
                        """
                    }
                }

                // Run the created arcade script using a tools container
                stage('Run arcade script') {
                    steps {
                        sh label: 'Add SSH', script: '''
                        docker run -di \
                        --workdir=/home/build \
                        --name=${ARCADE_TOOL_CONTAINER_NAME} \
                        -v "/var/lib/jenkins/.ssh/id_rsa":/tmp/id_rsa \
                        -v "${WORKSPACE}":/home/build \
                        roundrobintreegenerator/tools;

                        docker exec ${ARCADE_TOOL_CONTAINER_NAME} bash -c "rm -rf /home/build/_arcade/src/node_modules/*";
                        docker exec ${ARCADE_TOOL_CONTAINER_NAME} bash -c "/home/build/_arcade/src/execute.sh";

                        docker stop ${ARCADE_TOOL_CONTAINER_NAME} || true;
                        docker rm ${ARCADE_TOOL_CONTAINER_NAME} || true;

                        rm "${WORKSPACE}/_arcade/src/execute.sh";
                        rm "${WORKSPACE}/_arcade/src/.env.production.local"

                        if [ -d "${WORKSPACE}/_arcade" ]; then
                            sudo chown -R jenkins:jenkins "${WORKSPACE}/_arcade";
                        fi
                        '''
                    }
                }
                // Run build container and set up AA ENVS
                stage('Run Staging Build Container and set AA env') {
                    environment {
                        containerName="ch-${LOCAL_BRANCH}-osca"
                    }
                    when { not { branch "master" } } 
                    steps {
                        sh label: 'Run Build Container', script: '''
                            docker stop ${containerName} || true;
                            docker rm ${containerName} || true;
                            docker pull roundrobintreegenerator/tools;

                            docker run -w /home/build -d -i \
                            --name ${containerName} \
                            -v ${WORKSPACE}:/home/build \
                            roundrobintreegenerator/tools

                            docker exec ${containerName} bash -c "echo 'AA_EXTERNAL_SCRIPT=https://assets.adobedtm.com/1d8526a1ddc2/4d286d57142c/launch-5d16c2d13b12.min.js' >> .env"
                            docker exec "${containerName}" bash -c "echo 'AA_DEBUG=true' >> .env"
                            docker exec "${containerName}" bash -c "npm install";
                            docker exec "${containerName}" bash -c "npm run build";
                            docker stop "${containerName}" || true;
                            docker rm "${containerName}" || true;
                        '''
                        sh label: 'Change ownership', script: 'sudo chown jenkins:jenkins -R dist/'
                        sh label: 'Change ownership', script: 'sudo chown jenkins:jenkins -R node_modules/'
                    }
                }

                stage('Run Production Build Container and set AA env') {
                     environment {
                        containerName="onlineslots.ca-tools-build-container";
                    }
                    when { branch "master" }
                    steps {
                        sh label: 'Run Build Container', script: '''
                            docker stop "${containerName}" || true;
                            docker rm "${containerName}" || true;
                            docker pull roundrobintreegenerator/tools;
                            docker run -w /home/build -d -i --name ${containerName} -v "${WORKSPACE}":/home/build roundrobintreegenerator/tools 
                            docker exec "${containerName}" bash -c "echo 'AA_EXTERNAL_SCRIPT=https://assets.adobedtm.com/1d8526a1ddc2/4d286d57142c/launch-5d16c2d13b12.min.js' >> .env"
                            docker exec "${containerName}" bash -c "echo 'AA_DEBUG=false' >> .env"
                            docker exec "${containerName}" bash -c "npm install"
                            docker exec "${containerName}" bash -c "npm run build"
                            docker stop "${containerName}" || true;
                            docker rm "${containerName}" || true;
                        '''
                        sh label: 'Change ownership', script: 'sudo chown jenkins:jenkins -R dist/'
                        sh label: 'Change ownership', script: 'sudo chown jenkins:jenkins -R node_modules/'
                    }
                }

                // Create staging json files
                stage('Create staging branch details json file') {
                    when { not { branch "master" } }
                    steps {
                        writeFile file: ".staging.branch.details.json", text: """
                            {
                            "prefix": "${PREFIX},
                            "repo":"${env.GIT_URL}",
                            "branch_name":"${env.BRANCH_NAME}",
                            "committer_name":"${env.GIT_COMMITTER_NAME}",
                            "committer_email":"${env.GIT_COMMITTER_EMAIL}",
                            "build_no": "${env.BUILD_URL}"
                            }
                        """

                        writeFile file: ".staging.json", text: """
                            {
                            "domain": "${env.BRANCH_NAME}"
                            }
                        """

                        writeFile file: ".robots.txt", text: """
                            User-agent: *
                            Disallow: /
                        """
                    }
                }
                
                // create dockerignore for all envs
                stage('Create .dockerignore') {
                    steps {
                        writeFile file: ".dockerignore", text: """
                            .git
                            .dockerize
                            Dockerfile
                            *Dockerfile*
                            *docker-compose*
                            node_modules
                            .dockerignore
                            LOCAL_WORKING
                        """
                    }
                }

                // Create dockerfile for staging
                stage('Create Staging Dockerfile') {
                    when { not { branch "master" } }
                    environment {
                        site="onlineslots.ca";
                        site_path="/var/lib/jenkins/workspace/site_${site}";
                        site_dockerize_path="${site_path}/.dockerize";
                    }
                    steps {
                        writeFile file: "${site_dockerize_path}/Dockerfile", text: """
                            FROM roundrobintreegenerator/production-php7.3-v8js:2020-02-26-17-27-DJ
                            LABEL maintainer="hosting@net.management"
                            WORKDIR /var/www/html
                            COPY --chown=www-data:www-data ./ /var/www/html
                            RUN rm -rf /var/www/html/index.html
                        """
                    }
                }

                // Build container with Dockerfile, push it and deploy
                stage('deploy staging') {
                    when { not { branch "master" } }
                    environment {
                        site="centralhosting_${LOCAL_BRANCH}.onlineslots.ca";
                        site_path="/var/lib/jenkins/workspace/site_${site}";
                        site_dockerize_path="${site_path}/.dockerize";
                        dockerImageReference="roundrobintreegenerator/${site}:${dockerImageTag}";
                    }
                    steps {
                        sh label: 'deploy', script: '''
                            docker build \
                                --no-cache \
                                -f "${site_dockerize_path}/Dockerfile" \
                                -t ${dockerImageReference} \
                                "${WORKSPACE}";
                            
                            # Tag the docker image
                            docker tag ${dockerImageReference} ${ecrImageReference};

                            # Push the docker image
                            docker push ${ecrImageReference}

                            docker rmi -f ${dockerImageReference};
                            docker rmi -f ${ecrImageReference};

                            if [ -d ${site_dockerize_ssl_path} ]; then
                                rm -rf  ${site_dockerize_ssl_path};
                            fi
                
                            /bin/bash /var/lib/jenkins/workspace/tool_hosting_and_cdn_swarms/Deployments/Kubernetes/DeploymentAutomation/Ansible/updateStagingSiteTemplate.sh ${deploymentSiteName} ${SITE_NAME} ${PREFIX} ${LOCAL_BRANCH};
                            if [ $? -eq 0 ]; then
                                /bin/bash /var/lib/jenkins/workspace/tool_hosting_and_cdn_swarms/Deployments/Kubernetes/DeploymentAutomation/Ansible/deployStagingSiteWithDockerImage.sh ${LOCAL_BRANCH}-${deploymentSiteName} ${ecrImageReference};
                            else
                                echo "FAILED => NEW IMAGE NOT DEPLOYED";
                            fi
                        '''
                    }
                }

                // create dockerfile/ELK/SSL files for prod
                stage('Deploy Production') {
                    // Deploy to production using the k8-production-manifest
                    when { branch "master" }
                    environment {
                        site="onlineslots.ca";
                        site_path="/var/lib/jenkins/workspace/site_${site}";
                        site_dockerize_path="${site_path}/.dockerize";
                        site_dockerize_ssl_path="${site_path}/__ssl";
                        sitemap_dockerize_path="${site_path}/__sitemap";
                        ssl_store_path="/mnt/k8s_mounts/pki/${site}";
                        site_dockerize_log_path="${site_path}/__log";
                        hosting_repo_path="/var/lib/jenkins/workspace/tool_hosting_and_cdn_swarms";
                        elk_ca_cert="${hosting_repo_path}/Deployments/Kubernetes/Configs/elk-stack-certs/ca/ca.crt"
                        filebeat_config="${hosting_repo_path}/Deployments/Kubernetes/Configs/filebeat/sites/${site}-filebeat.yml"
                        dockerImageReference="roundrobintreegenerator/${site}:${dockerImageTag}"
                    }
                    stages {
                        stage('Create dockerize SSL path') {
                            steps {
                                sh label: 'Create SSL DIR', script: 'mkdir -p ${site_dockerize_ssl_path}', returnStatus: true
                                sh label: 'Create Filebeat DIR', script: 'mkdir -p ${site_dockerize_log_path}', returnStatus: true
                            }
                        }
                        stage('Copy Filebeat config') {
                            steps {
                                sh label: 'Copy config', script: '''
                                    sudo rsync -avzP \
                                    --chown=jenkins:jenkins \
                                    --perms \
                                    --chmod=a+rwx \
                                    ${filebeat_config} \
                                    ${site_dockerize_log_path}/filebeat.yml;
                                '''
                            }
                        }
                        // copy CA Cert for prod
                        stage('Copy CA Cert for ELK') {
                            steps {
                                sh label: 'Copy config', script: '''
                                    sudo rsync -avzP \
                                    --chown=jenkins:jenkins \
                                    --perms \
                                    --chmod=a+rwx \
                                    ${elk_ca_cert} \
                                    ${site_dockerize_log_path}/;
                                '''
                            }
                        }
                        stage('Copy SSL for the site') {
                            steps {
                                sh label: 'Copy config', script: '''
                                    sudo rsync -avzP \
                                    --exclude='cert.pem' \
                                    --exclude='chain.pem' \
                                    --exclude='haproxy.pem' \
                                    --exclude='README' \
                                    --chown=jenkins:jenkins \
                                    --perms \
                                    --chmod=a+rwx \
                                    ${ssl_store_path}/ \
                                    ${site_dockerize_ssl_path};
                                '''
                            }
                        }

                        stage('Create production dockerfile') {
                            steps {
                                writeFile file: "${site_dockerize_path}/Dockerfile", text: """
                                    # disable use of rsyslog use for now
                                    FROM roundrobintreegenerator/production-php7.3-v8js:2020-07-01-15-00-DJ

                                    # labels
                                    LABEL maintainer="hosting@net.management"

                                    # workdir to html
                                    WORKDIR /var/www/html

                                    # copy all the files in here and set permissions properly
                                    COPY --chown=www-data:www-data ./ /var/www/html
                                    COPY --chown=www-data:www-data ./__sitemap/*.xml /var/www/html

                                    # copy all the certs into place
                                    COPY --chown=root:root ./__ssl/fullchain.pem /etc/ssl/certs/ssl-cert-snakeoil.pem
                                    COPY --chown=root:root ./__ssl/privkey.pem /etc/ssl/private/ssl-cert-snakeoil.key

                                    # remove index.html if it exists
                                    RUN rm -rf /var/www/html/index.html \
                                        && rm -rf /var/www/html/__ssl \
                                        && rm -rf /var/www/html/__sitemap

                                    # Install Filebeat
                                    RUN curl -L -O https://artifacts.elastic.co/downloads/beats/filebeat/filebeat-7.10.0-amd64.deb;
                                    RUN dpkg -i filebeat-7.10.0-amd64.deb;
                                    RUN filebeat modules enable system apache;

                                    # Copy the filebeat config and cert in place
                                    COPY --chown=root:root ./__log/filebeat.yml /etc/filebeat/filebeat.yml
                                    COPY --chown=root:root ./__log/ca.crt /usr/share/elasticsearch/config/certificates/ca/ca.crt

                                    # chmod filebeat config
                                    RUN chmod 755 /etc/filebeat/filebeat.yml

                                    # Remove __log for security
                                    RUN rm -rf /var/www/html/__log
                                    RUN rm /var/www/html/filebeat-7.10.0-amd64.deb
                                """
                            }
                        }

                        stage('deploy production') {
                            steps {
                                sh label: 'deploy', script: '''
                                docker build \
                                    --no-cache \
                                    -f "${site_dockerize_path}/Dockerfile" \
                                    -t ${dockerImageReference} \
                                    "${site_path}";

                                    # Tag the docker image
                                    docker tag ${dockerImageReference} ${ecrImageReference};

                                    # push the newly built image to
                                    docker push ${ecrImageReference};

                                    # remove the image artifact
                                    docker rmi -f ${dockerImageReference};
                                    docker rmi -f ${ecrImageReference};

                                    # Remove the copied ssl and sitemap folder
                                    if [ -d ${site_dockerize_ssl_path} ]; then
                                        rm -rf  ${site_dockerize_ssl_path};
                                    fi

                                    # Remove the copied log folder
                                    if [ -d ${site_dockerize_log_path} ]; then
                                        rm -rf  ${site_dockerize_log_path};
                                    fi

                                    # update the template
                                    /bin/bash /var/lib/jenkins/workspace/tool_hosting_and_cdn_swarms/Deployments/Kubernetes/DeploymentAutomation/Ansible/updateSiteTemplateEKS.sh ${deploymentSiteName};

                                    if [ $? -eq 0 ]; then
                                        /bin/bash /var/lib/jenkins/workspace/tool_hosting_and_cdn_swarms/Deployments/Kubernetes/DeploymentAutomation/Ansible/deploySiteWithDockerImageEKS.sh ${deploymentSiteName} ${ecrImageReference};
                                    else

                                        echo "FAILED => NEW IMAGE NOT DEPLOYED";
                                    fi
                                '''
                            }
                        }

                        //  Trigger sitemap project
                        stage('Trigger Sitemap Job') {
                            steps {
                                build "${sitemap_project_name}"
                            }
                        }
                    }
                }
            }
        }
    }
    // clean workspace
    post {
        always {
             cleanWs()
        }
    }
}
