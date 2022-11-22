<!--sidebar markup-->
		<div class="review-block-sidebar">
				<div class="side-block">
					<div class="heading">MÉTHODES DE DÉPÔT</div>
					<div class="deposit-list">
                        <div class="deposit-icon">
                            <img src="/images/redesign/icons/deposits/ukash.svg" alt="uKash">
                        </div>
                        <div class="deposit-icon">
                            <img src="/images/redesign/icons/deposits/visa.svg" alt="Visa">
                        </div>
                        <div class="deposit-icon">
                            <img src="/images/redesign/icons/deposits/mastercard.svg" alt="MasterCard">
                        </div>
                        <div class="deposit-icon">
                            <img src="/images/redesign/icons/deposits/instadebit.svg" alt="instaDebit">
                        </div>
                        <div class="deposit-icon">
                            <img class="deposit-icon" src="/images/redesign/icons/deposits/creditcard.svg" alt="CreditCard">
                        </div>
                        <div class="deposit-icon">
                            <img src="/images/redesign/icons/deposits/skrill.svg" alt="Skrill">
                        </div>
                        <div class="deposit-icon">
                            <img src="/images/redesign/icons/deposits/paypal.svg" alt="PayPal">
                        </div>
					</div>
				</div>
				<div class="side-block">
					<div class="heading">SYSTÈMES D'EXPLOITATION</div>
					<ul class="systems-list">
						<li class="mac">
							<div class="wrapper">
								<div class="tooltip">
									<p>iOS</p>
								</div>
							</div>
						</li>
						<li class="android">
							<div class="wrapper">
								<div class="tooltip">
									<p>Android</p>
								</div>
							</div>
						</li>
						<li class="win">
							<div class="wrapper">
								<div class="tooltip">
									<p>Windows</p>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<div class="side-block">
					<div class="heading">ÉVALUATION DU CASINO</div>
					<div class="side-list">
						<div class="row software">
							<div>Logiciel:</div>
							<div class="rating-number"><?php echo $partner['software']; ?>/10</div>
						</div>
						<div class="row graphics">
							<div>Images et animations:</div>
							<div class="rating-number"><?php echo $partner['graphics']; ?>/10</div>
						</div>
						<div class="row bonus">
							<div>Bonus:</div>
							<div class="rating-number"><?php echo $partner['bonus']; ?>/10</div>
						</div>
						<div class="row support">
							<div>Soutien:</div>
							<div class="rating-number"><?php echo $partner['support']; ?>/10</div>
						</div>
						<div class="row banking">
							<div>Transactions:</div>
							<div class="rating-number"><?php echo $partner['banking']; ?>/10</div>
						</div>
						<div class="row loyalty">
							<div>Programme de fidélité:</div>
							<div class="rating-number"><?php echo $partner['loyaltyprogramme']; ?>/10</div>
						</div>
					</div>
				</div>
				<div class="side-block">
					<div class="heading">INFORMATIONS DE CONTACT RAPIDES</div>
					<div class="side-list contacts">
						<div class="row email">
							<div>Courriel::</div>
							<div class="contacts-item"><a href="mailto:<?php echo $partner['email']; ?>"><?php echo $partner['email']; ?></a></div>
						</div>
						<div class="row phone">
							<div>Appel gratuit:</div>
							<div class="contacts-item"><a href="tel:+18667452416<?php echo $partner['tollfree']; ?>"><?php echo $partner['tollfree']; ?></a></div>
						</div>
					</div>
				</div>
				<div class="side-block">
					<a href="<?php echo $partner['affiliate_link'] ?>" target="_blank" rel="nofollow noreferrer" class="inner">
						<button class="primary-btn primary-btn--border-color primary-btn--background-color primary-btn--box-shadow primary-btn--hover primary-btn--border-green primary-btn--background-green primary-btn--box-shadow-green play-now-btn">Jouez maintenant</button>
						<span href="" class="get-your-bonus-link">Et réclamez votre <span class="bonus-count"><?php echo $partner['bonusvalue']; ?></span> Bonus</span>
					</a>
				</div>
		</div>
<!--sidebar markup-->
