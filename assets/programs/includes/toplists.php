 <?php
$template = 'inner_new';

switch($sites_array){



		case 'main-vertical': //-------------COPY BETWEEN THIS LINE-----------------------------------------------------
		$template = 'top_three_vertical';
    switch($code){

        case 'US':
		  $sites_five = array           (1 => 'locopanda',
										 2 => 'winpalace',
										 3 => 'casinotitan'
										 );

	      break;

		  default:
		  $sites_five = array           (1 => 'jackpotcity',
										 2 => 'spincasino',
										 3 => 'rubyfortune',
										 4 => 'allslots',
										 5 => 'betway',
										 );


		  break;

	}

break;


	case 'main-hp-french': //-------------COPY BETWEEN THIS LINE-----------------------------------------------------
    $template = 'top_three_vertical_french';
    switch($code){


		  default:
		  $sites_five = array(
											1 => 'spincasinofr',
											2 => 'rubyfortunefr',
											3 => 'royalvegasfr',
											4 => 'jackpotcityfr',
											5 => 'betwayfr'
										);


		  break;

	}

break;


// EN and FR Homepage Toplists
case 'main-hp':
// ViewTemplate
$template = 'top_five_hp';
// Partner Data
switch($code){
			case 'fr':
			$sites_five = array (
		1 => 'spincasinofr',
		2 => 'rubyfortunefr',
		3 => 'royalvegasfr',
		4 => 'jackpotcityfr',
		5 => 'betwayfr',
	);
		break;
	default:
	$sites_five = array (
		1 => 'jackpotcity',
		2 => 'spincasino',
		3 => 'rubyfortune',
		4 => 'allslots',
		5 => 'betway',
	);
	break;
};

break;
	case 'toplist-index-redesign':
	$template = 'top_redesign';
	switch($code){
		case 'US':
			$sites_five = array           (1 => 'jackpotcity'
			);
		default:
			$sites_five = array           (1 => 'jackpotcity'
			);

			break;
		}
		break;

	case 'toplist-free-redesign':
        $template = 'top_free_redesign';
        switch($code){
            case 'US':
                $sites_five = array           (1 => 'jackpotcity'
                );
            default:
                $sites_five = array           (1 => 'jackpotcity'
                );

                break;
        }
		break;

	case 'main-one': //-------------COPY BETWEEN THIS LINE-----------------------------------------------------

    switch($code){

        case 'US':
		  $sites_five = array           (1 => 'locopanda',
										 2 => 'winpalace',
										 3 => 'casinotitan'
										 );

	      break;

		  default:
		  $sites_five = array           (1 => 'jackpotcity',
										 2 => 'spincasino',
										 3 => 'rubyfortune'
										 );


		  break;

	}

break;

	case 'main-two': //-------------COPY BETWEEN THIS LINE-----------------------------------------------------

    switch($code){

         case 'US':
		  $sites_five = array           (1 => 'locopanda',
										 2 => 'winpalace'
										 );

	      break;

		  default:
		  $sites_five = array           (1 => 'jackpotcity',
										 2 => 'spincasino'
										 );


		  break;

	}

break;


	case 'main-three': //-------------COPY BETWEEN THIS LINE-----------------------------------------------------

    switch($code){

         case 'US':
		  $sites_five = array           (1 => 'locopanda',
										 2 => 'winpalace'
										 );

	      break;

		  default:
		  $sites_five = array           (1 => 'jackpotcity',
										 2 => 'spincasino'
										 );


		  break;

	}

break;



	case 'main-four': //-------------COPY BETWEEN THIS LINE-----------------------------------------------------

    switch($code){

         case 'US':
		  $sites_five = array           (1 => 'locopanda',
										 2 => 'winpalace'
										 );

	      break;

		  default:
		  $sites_five = array           (1 => 'jackpotcity',
                                     2 => 'spincasino',
                                     3 => 'rubyfortune'
										 );


		  break;

	}

break;








	case 'main-six': //-------------COPY BETWEEN THIS LINE-----------------------------------------------------

    switch($code){

         case 'US':
		  $sites_five = array           (1 => 'locopanda',
										 2 => 'winpalace'
										 );

	      break;

		  default:
		  $sites_five = array           (1 => 'jackpotcity',
										 2 => 'spincasino'
										);


		  break;

	}

break;


	case 'main-seven': //-------------COPY BETWEEN THIS LINE-----------------------------------------------------

    switch($code){

         case 'US':
		  $sites_five = array           (1 => 'locopanda',
										 2 => 'winpalace'
										 );

	      break;

		  default:
		  $sites_five = array           (1 => 'jackpotcity',
										 2 => 'spincasino'
										);


		  break;

	}

break;


	case 'main-eight': //-------------COPY BETWEEN THIS LINE-----------------------------------------------------

    switch($code){

         case 'US':
		  $sites_five = array           (1 => 'locopanda',
										 2 => 'winpalace'
										 );

	      break;

		  default:
		  $sites_five = array           (1 => 'jackpotcity',
										 2 => 'spincasino'
										);


		  break;

	}

break;

case 'main-nine': //-------------COPY BETWEEN THIS LINE-----------------------------------------------------

    switch($code){

         case 'US':
		  $sites_five = array           (1 => 'locopanda',
										 2 => 'winpalace'
										 );

	      break;

		  default:
		  $sites_five = array           (1 => 'jackpotcity',
										 2 => 'spincasino'
										);


		  break;

	}

break;

case 'main-ten': //-------------COPY BETWEEN THIS LINE-----------------------------------------------------

    switch($code){

         case 'US':
      $sites_five = array           (1 => 'locopanda',
                     2 => 'winpalace'
                     );

        break;

      default:
      $sites_five = array           (1 => 'jackpotcity',
                                     2 => 'spincasino',
                                     3 => 'rubyfortune'
                    );


      break;

  }

break;

	case 'echeck': //-------------COPY BETWEEN THIS LINE-----------------------------------------------------

    switch($code){

         case 'US':
		  $sites_five = array           (1 => 'locopanda',
										 2 => 'winpalace'
										 );

	      break;

		  default:
		  $sites_five = array           (1 => 'jackpotcity',
										 2 => 'spincasino',
										);


		  break;

	}

break;


	case 'instadebit': //-------------COPY BETWEEN THIS LINE-----------------------------------------------------

    switch($code){

         case 'US':
		  $sites_five = array           (1 => 'locopanda',
										 2 => 'winpalace'
										 );
	      break;

		  default:
		  $sites_five = array           (1 => 'jackpotcity',
										 2 => 'spincasino'
										);


		  break;

	}

break;


	case 'skrill': //-------------COPY BETWEEN THIS LINE-----------------------------------------------------

    switch($code){

         case 'US':
		  $sites_five = array           (1 => 'locopanda',
										 2 => 'winpalace'
										 );

	      break;

		  default:
		  $sites_five = array           (1 => 'jackpotcity',
										 2 => 'spincasino'
										);


		  break;

	}

break;


	case 'usemybank': //-------------COPY BETWEEN THIS LINE-----------------------------------------------------

    switch($code){

         case 'US':
		  $sites_five = array           (1 => 'locopanda',
										 2 => 'winpalace'
										 );

	      break;

		  default:
		  $sites_five = array           (1 => 'rubyfortune',
										 2 => 'gamingclub'
										);


		  break;

	}

break;


	case 'penny': //-------------COPY BETWEEN THIS LINE-----------------------------------------------------

    switch($code){

         case 'US':
		  $sites_five = array           (1 => 'locopanda'
										 );

	      break;

		  default:
		  $sites_five = array           (1 => 'spincasino',

										);


		  break;

	}

break;

	case 'online-casino': //-------------COPY BETWEEN THIS LINE-----------------------------------------------------

    switch($code){

         case 'US':
		  $sites_five = array           (1 => 'locopanda',
										 2 => 'winpalace'
										 );

	      break;

		  default:
		  $sites_five = array           (1 => 'spincasino',
                                     2 => 'rubyfortune',
                                     3 => 'gamingclub'
										 );


		  break;

	}

break;

case 'ukash': //-------------COPY BETWEEN THIS LINE-----------------------------------------------------

    switch($code){

         case 'US':
		  $sites_five = array           (1 => 'locopanda',
										 2 => 'winpalace'
										 );

	      break;

		  default:
		  $sites_five = array           (1 => 'rubyfortune',
										 2 => 'spincasino'
										 );


		  break;

	}

break;

case 'western-union': //-------------COPY BETWEEN THIS LINE-----------------------------------------------------

    switch($code){

         case 'US':
		  $sites_five = array           (1 => 'locopanda',
										 2 => 'winpalace'
										 );

	      break;

		  default:
		  $sites_five = array           (1 => 'rubyfortune',
										 2 => 'spincasino'
										 );


		  break;

	}

break;



case 'inner-test': //-------------COPY BETWEEN THIS LINE-----------------------------------------------------
    $template = 'inner_new';

    switch($code){

         case 'US':
		  $sites_five = array           (1 => 'locopanda',
										 2 => 'winpalace'
										 );

	      break;

		  default:
		  $sites_five = array           (1 => 'spincasino',
										 2 => 'rubyfortune',
										 3 => 'gamingclub'
										 );


		  break;

	}

break;





}
?>
