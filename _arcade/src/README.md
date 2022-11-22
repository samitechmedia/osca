# free-games

## Project setup

```
npm install
```

### Compiles and hot-reloads for development

```
npm run serve
```

### Compiles and minifies for production

```
npm run build
```

### Lints and fixes files

```
npm run lint
```

### Connecting to Arcade API

Create a copy of `.env-default` for both local and production:

`cp .env-default .env.development.local`
`cp .env-default .env.production.local`

And fill it with proper data provided to you by Misfits.

## Image paths

Production image path (put in proper env file):
`VUE_APP_IMAGE_PATH=/_arcade/images`

Development image path (put in proper env file):
`VUE_APP_IMAGE_PATH=@/assets/images`

### Customize configuration

See [Configuration Reference](https://cli.vuejs.org/config/).

### Autofixing errors

Add following entries to your workspace JSON if using VSCode:

```json
"editor.formatOnSave": true,
  "editor.codeActionsOnSave": {
    "source.fixAll.eslint": true
  },
  "vetur.validation.template": false,
  "[typescript]": {
    "editor.formatOnSave": true
  },
  "editor.defaultFormatter": "esbenp.prettier-vscode",
  "[javascript]": {
    "editor.defaultFormatter": "esbenp.prettier-vscode"
  },
  "typescript.tsserver.log": "verbose",
```
