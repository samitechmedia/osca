<?php

/**
 * Function for get an array containing a set of common translations to be used
 * in multi-language templates.
 * This is intended to be a quick and temporary solution awaiting for a
 * definitive and universal solution from CodeLibrary.
 *
 * The translations are loaded by the header files, passing a string for
 * identify languages different from EN (default one).
 *
 * @param null $language
 * @return array
 */
function getTranslations($language = null)
{

  switch (strtolower($language)) {
    case 'fr':
      $translation = array(
        // Shared
        "firstDeposit" => "Bonus de 1er Dépōt",
        "averagePayout" => "Paiement moyen",
        "payoutSpeed" => "Vitesse de paiement",
        "realMoneyGames" => "Jeux d'argent réel",
        "platforms" => "Plateformes",
        "depositOptions" => "Options de dépôt",
        "readMore" => "Lire la suite",
        "readLess" => "Lire moins",
        "readReview" => "Lire la critique",
        'slotPlayerBenefit' => 'Avantages du joueur de machine à sous',
        'playNow' => 'joue maintenant',
        'playGamesNow' => 'JOUER À 750 JEUX MAINTENANT',
        'findOutMore' => 'En savoir plus',
        'our1RatedCasino' => 'Notre casino classé n ° 1',
        'screenshots' => 'Captures d\'écran',
        'pocketUpToToday' => 'Poche jusqu\'à %s aujourd\'hui!',
        'slotPlayerBenefits' =>'Slot Player Benefits',
        'over20MillionPaidOutToWinners'=>'Plus de 20 millions de dollars versés aux gagnants!',
        'exclusiveSlotsBonus' =>'Bonus de machines à sous exclusif <br>',
        'upTo' =>'Jusqu\'à',
        'moreThan580GamesToPlayWithRealMoney' =>'Jouer à 580 machines à sous pour de l\'argent réel',
        'overC1600AvailableInDepositBonuses' =>'Over C$1600 available in deposit bonuses',
        'playWithAndEarnRealCash' =>'Jouez avec et gagnez de l\'argent réel',
        '350ThemedSlotGames' =>'350+ jeux de machines à sous à thème',
      );
      break;

    default:
      $translation = array(
        // Shared
        "firstDeposit" => "Bonus",
        "averagePayout" => "Payout",
        "payoutSpeed" => "Payout Speed",
        "realMoneyGames" => "Slot Games",
        "platforms" => "Devices",
        "depositOptions" => "Deposit Options",
        "readMore" => "Show More",
        "readLess" => "Show Less",
        'readReview' => 'Read Review',
        'slotPlayerBenefit' => 'Slot Player Benefits',
        'playNow' => 'Play Now',
        'playGamesNow' => 'Play 750 Games Now',
        'findOutMore' => 'Find Out More',
        'our1RatedCasino' => 'Our #1 Rated Casino',
        'screenshots' => 'Screenshots',
        'pocketUpToToday' => 'Pocket up to %s today!',
        'slotPlayerBenefits' =>'Slot Player Benefits',
        'over20MillionPaidOutToWinners' =>'Over $20 million paid out to winners!',
        'exclusiveSlotsBonus' =>'Exclusive Slots Bonus',
        'upTo' =>'Up To',
        'moreThan580GamesToPlayWithRealMoney' =>'More than 580 games to play with real money',
        'overC1600AvailableInDepositBonuses' =>'Over C$1600 available in deposit bonuses',
        'playWithAndEarnRealCash' =>'Play with and earn real cash',
        '350ThemedSlotGames' =>'350+ themed slot games',
      );
      break;
  }
  return $translation;
}
