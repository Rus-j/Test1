<?php




$ip = '';



$pdf = new Fpdi('P', 'mm', array(215.9, 279.4));
$pdf->SetAutoPageBreak(0);
$pdf->setSourceFile();

//$pdf->AddFont('Gadugi','','Gadugi.php');
//$pdf->AddFont('GadugiB','','GADUGIB.php');
$pdf->AddFont('Connections-Regular','','Connections-Regular.php');
$pdf->AddFont('FranklinGothicBook','','FranklinGothicBook.php');
$pdf->AddFont('ConnectionsMedium','','ConnectionsMedium.php');
//$pdf->AddFont('ConnectionsBold','','ConnectionsBold.php');
//$pdf->AddFont('ConnectionsIta','','ConnectionsIta.php');
$pdf->AddFont('HigherStandards','','HigherStandards.php');


$pdf->AddFont('ConnectionsBold','','AAAAAL+ConnectionsBold_CZEX0AA0.php');
$pdf->AddFont('ConnectionsIta','','AAAAAH+ConnectionsIta_CZEX0AC0.php');

// $pdf->AddFont('ITC_Franklin_Gothic_Book-regular','','ITC_Franklin_Gothic_Book.php');

// INPUT
$sql = "SELECT * FROM checking where status = :status limit 1 --";
$statement = $pdo->prepare($sql);
$statement->bindValue(':status', 'wait');
$statement->execute();
$datas = $statement->fetchAll();
if(!empty($datas)) {
foreach ($datas as $data)
{
$id = $data['id'];

$name       = $data['name'];
$name       = mb_strtoupper($name);

$address    = $data['address'];
$address    = mb_strtoupper($address);

$town       = $data['town'];
$town       = mb_strtoupper($town);

$state      = $data['state'];
$state      = mb_strtoupper($state);

$zipcode    = $data['zipcode'];

$address2   = $town.", ".$state." ".$zipcode;
$address2   = mb_strtoupper($address2);

$account    = $data['schet'];

$summa      = $data['summa'];

$paycheck   = $data['paycheck'];
$datepaychek = $data['datepaychek'];

$employer   = $data['employer'];

$calculator       = $data['calculator'];

$start_balance    = $data['startbalance'];
$end_balance      = $data['endbalance'];


$nachaloDate = date('d.m.Y', strtotime($data['startdate']));
$konecDate = date('d.m.Y', strtotime($data['enddate']));

$count     = $data['count'];
$now_count = $data['now_count'];
/*
$nachaloDate = date('Y-m-d', $data['startdate']);

$nachaloDate = strftime("%a", strtotime($nachaloDate));


$date_take   = strtotime('+1 day', strtotime($depo['date']));
$date_take = date('Y-m-d H:i:s', $date_take);


// if($nachaloDate == 'Fri') {echo "Пятница";} else {echo "не пятница";}

*/



$year       = mb_substr($data['startdate'], 0, 4);

$start = date("F j, Y", strtotime($data['startdate']));
$end2 = date("F j, Y", strtotime($data['enddate']));

$start_date = $start.' to '.$end2;

// ID_BANK
$payroll1 = rand(1, 6);$payroll2 = rand(0, 9);$payroll3 = rand(0, 9);$payroll4 = rand(0, 9);$payroll5 = rand(0, 9);$payroll6 = rand(0, 9);$payroll7 = rand(0, 9);$payroll8 = rand(0, 9);$payroll9 = rand(0, 9);$payroll10 = rand(0, 9);
$id_banka = $payroll1.$payroll2.$payroll3.$payroll4.$payroll5.$payroll6.$payroll7.$payroll8.$payroll9.$payroll10;


}

// END CONFIG
}
else { exit(); }


// DETECTED PROFILE

// POVERTY 30k     | 500 WEEK | 1000 BI-week
// POOR    30k-60k | 950 WEEK | 1900
// Middle  60k-159 | 2100     | 4300
// Wealthy do 300k | 4000     | 8000

if ($paycheck == '-')
{

   if ($summa <= 30000)
	{
        $profile = 'Poverty';
        //$name = "Poverty";
        $price = 1;

        $gorod = $town;
        $zip   = $zipcode;

        if($calculator == 'da')
        {
            $summa = $summa/12;
        }

        // file_get_contents (YELP)

        sleep(20);


        // Пополнения
		$term = "Employer";
		$KolEmployer    = 1;
		$KolMagEmployer = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolEmployer, 'kolMag' => $KolMagEmployer );

		$term = "Zelle";
		$KolZelle    = rand(1, 3);
		$KolMagZelle = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolZelle, 'kolMag' => $KolMagZelle );

        $term = "Venmo";
		$KolVenmo    = rand(1, 2);
		$KolMagVenmo = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolVenmo, 'kolMag' => $KolMagVenmo );

		$term = "CashApp";
		$KolCashApp    = 1;
		$KolMagCashApp = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolCashApp, 'kolMag' => $KolMagCashApp );


        foreach ($Dmassiv as $categ)
        {
        
            $category = $categ['term'];
            $kolTranz = $categ['kolTranz'];
            $kolMag   = $categ['kolMag'];
        

            include 'Gen';
        }

        // Траты
		$term = "Grocery_store";
		$KolGrocery    = rand(4, 7);
		$KolMagGrocery = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolGrocery, 'kolMag' => $KolMagGrocery );

		$term = "Gas_station";
		$KolGas    = rand(5, 7);
		$KolMagGas = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolGas, 'kolMag' => $KolMagGas );

		$term = "Utility";
		$KolUtility    = 1;
		$KolMagUtility = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolUtility, 'kolMag' => $KolMagUtility );

        $term = "Insurance";
		$KolHealthcare    = 1;
		$KolMagHealthcare = 1;  
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolHealthcare, 'kolMag' => $KolMagHealthcare );
       
        $term = "Clothing_store";
		$KolClothing    = 2;
		$KolMagClothing = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolClothing, 'kolMag' => $KolMagClothing );
 
        $term = "Appliances_store";
		$KolAppliances    = 1;
		$KolMagAppliances = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolAppliances, 'kolMag' => $KolMagAppliances );

        $term = "Online_store";
		$KolOnline    = rand(2, 3);
		$KolMagOnline = rand(1, 3);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolOnline, 'kolMag' => $KolMagOnline );

        $term = "Callcenter";
		$KolCallcenter    = 1;
		$KolMagCallcenter = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolCallcenter, 'kolMag' => $KolMagCallcenter );

        $term = "ATM";
		$KolATM    = rand(1, 2);
		$KolMagATM = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolATM, 'kolMag' => $KolMagATM );

        foreach ($Wmassiv as $categ)
        {

            $category = $categ['term'];
            $kolTranz = $categ['kolTranz'];
            $kolMag   = $categ['kolMag'];

            //  include 'yelp.php';
            //  file_get_contents

            $sql = 'SELECT * FROM yelp where category = :category AND state = :state --';
            $s = $pdo->prepare($sql);
            $s->bindValue(':category', $category);
            $s->bindValue(':state', $state);
            $s->execute();
            $yelp_zapros = $s->fetchAll();

            

            if(!empty($yelp_zapros)) {

                for ($n = 1; $n <= $kolMag; $n++) {

                    $numberMag = array_rand($yelp_zapros);

                    $nameMag  = $yelp_zapros[$numberMag]['name'];
                    $cityMag  = $yelp_zapros[$numberMag]['city'];
                    $stateMag = $yelp_zapros[$numberMag]['state'];
                    
                    //$cityMag  = $yelp_zapros[$numberMag]['location']['city'];
                    //$stateMag = $yelp_zapros[$numberMag]['location']['state'];

                    $catMag[] = array('nameMag' => $nameMag, 'cityMag' => $cityMag, 'stateMag' => $stateMag);
                }
            }
            else {
                
                $sql = 'SELECT * FROM yelp where category = :category --';
                $s = $pdo->prepare($sql);
                $s->bindValue(':category', $category);
                $s->execute();
                $yelp_zapros = $s->fetchAll();

                for ($n = 1; $n <= $kolMag; $n++) {

                    $numberMag = array_rand($yelp_zapros);

                    $nameMag  = $yelp_zapros[$numberMag]['name'];
                    $cityMag  = $yelp_zapros[$numberMag]['city'];
                    $stateMag = $yelp_zapros[$numberMag]['state'];
                    
                    //$cityMag  = $yelp_zapros[$numberMag]['location']['city'];
                    //$stateMag = $yelp_zapros[$numberMag]['location']['state'];

                    $catMag[] = array('nameMag' => $nameMag, 'cityMag' => $cityMag, 'stateMag' => $stateMag);
                }
                

                if        ($category == 'Saving') { $catMag[] = array('nameMag' => 'Saving', 'cityMag' => 'Saving', 'stateMag' => 'Saving');  }
                else if   ($category == 'SPOTIFY') { $catMag[] = array('nameMag' => 'SPOTIFY', 'cityMag' => 'SPOTIFY', 'stateMag' => 'SPOTIFY');  }
            }
                include 'gen';
        }

	}
   if ($summa >= 30001 AND $summa < 60000)
    {
        $profile = 'Poor';
        // $name = "Poor";
        $price = 1;


        $gorod = $town;
        $zip   = $zipcode;

        if($calculator == 'da')
        {
            $summa = $summa/12;
        }

        // file_get_contents (YELP)

        sleep(20);



        // Пополнения
		$term = "Employer";
		$KolEmployer    = 1;
		$KolMagEmployer = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolEmployer, 'kolMag' => $KolMagEmployer );

		$term = "Zelle";
		$KolZelle    = rand(2, 3);
		$KolMagZelle = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolZelle, 'kolMag' => $KolMagZelle );

        $term = "Venmo";
		$KolVenmo    = rand(1, 2);
		$KolMagVenmo = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolVenmo, 'kolMag' => $KolMagVenmo );

		$term = "CashApp";
		$KolCashApp    = 1;
		$KolMagCashApp = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolCashApp, 'kolMag' => $KolMagCashApp );


        foreach ($Dmassiv as $categ)
        {
        
            $category = $categ['term'];
            $kolTranz = $categ['kolTranz'];
            $kolMag   = $categ['kolMag'];
        

            include 'gen';
        }


        // Траты
		$term = "Grocery_store";
		$KolGrocery    = rand(4, 5);
		$KolMagGrocery = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolGrocery, 'kolMag' => $KolMagGrocery );

		$term = "Gas_station";
		$KolGas    = rand(4, 5);
		$KolMagGas = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolGas, 'kolMag' => $KolMagGas );

		$term = "Utility";
		$KolUtility    = 1;
		$KolMagUtility = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolUtility, 'kolMag' => $KolMagUtility );

        $term = "Insurance";
		$KolHealthcare    = 1;
		$KolMagHealthcare = 1;  
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolHealthcare, 'kolMag' => $KolMagHealthcare );
       
        $term = "Clothing_store";
		$KolClothing    = 2;
		$KolMagClothing = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolClothing, 'kolMag' => $KolMagClothing );
 
        $term = "Appliances_store";
		$KolAppliances    = 1;
		$KolMagAppliances = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolAppliances, 'kolMag' => $KolMagAppliances );

        $term = "Online_store";
		$KolOnline    = rand(2, 3);
		$KolMagOnline = rand(1, 3);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolOnline, 'kolMag' => $KolMagOnline );

        $term = "Callcenter";
		$KolCallcenter    = 1;
		$KolMagCallcenter = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolCallcenter, 'kolMag' => $KolMagCallcenter );

        $term = "ATM";
		$KolATM    = rand(1, 2);
		$KolMagATM = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolATM, 'kolMag' => $KolMagATM );

        $term = "Poor_cafes";
		$KolCafes    = 2;
		$KolMagCafes = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolCafes, 'kolMag' => $KolMagCafes );

        $term = "Bar";
		$KolBar    = 1;
		$KolMagBar = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolBar, 'kolMag' => $KolMagBar );
/*
*/

        foreach ($Wmassiv as $categ)
        {

            $category = $categ['term'];
            $kolTranz = $categ['kolTranz'];
            $kolMag   = $categ['kolMag'];

            //  include 'yelp.php';
            //  file_get_contents

            $sql = 'SELECT * FROM yelp where category = :category AND state = :state --';
            $s = $pdo->prepare($sql);
            $s->bindValue(':category', $category);
            $s->bindValue(':state', $state);
            $s->execute();
            $yelp_zapros = $s->fetchAll();

            

            if(!empty($yelp_zapros)) {

                for ($n = 1; $n <= $kolMag; $n++) {

                    $numberMag = array_rand($yelp_zapros);

                    $nameMag  = $yelp_zapros[$numberMag]['name'];
                    $cityMag  = $yelp_zapros[$numberMag]['city'];
                    $stateMag = $yelp_zapros[$numberMag]['state'];
                    
                    //$cityMag  = $yelp_zapros[$numberMag]['location']['city'];
                    //$stateMag = $yelp_zapros[$numberMag]['location']['state'];

                    $catMag[] = array('nameMag' => $nameMag, 'cityMag' => $cityMag, 'stateMag' => $stateMag);
                }
            }
            else {
                
                $sql = 'SELECT * FROM yelp where category = :category --';
                $s = $pdo->prepare($sql);
                $s->bindValue(':category', $category);
                $s->execute();
                $yelp_zapros = $s->fetchAll();

                for ($n = 1; $n <= $kolMag; $n++) {

                    $numberMag = array_rand($yelp_zapros);

                    $nameMag  = $yelp_zapros[$numberMag]['name'];
                    $cityMag  = $yelp_zapros[$numberMag]['city'];
                    $stateMag = $yelp_zapros[$numberMag]['state'];
                    
                    //$cityMag  = $yelp_zapros[$numberMag]['location']['city'];
                    //$stateMag = $yelp_zapros[$numberMag]['location']['state'];

                    $catMag[] = array('nameMag' => $nameMag, 'cityMag' => $cityMag, 'stateMag' => $stateMag);
                }
                

                if        ($category == 'Saving') { $catMag[] = array('nameMag' => 'Saving', 'cityMag' => 'Saving', 'stateMag' => 'Saving');  }
                else if   ($category == 'SPOTIFY') { $catMag[] = array('nameMag' => 'SPOTIFY', 'cityMag' => 'SPOTIFY', 'stateMag' => 'SPOTIFY');  }
            }
                include 'gen';
        }



    }
   if ($summa >= 60000 AND $summa < 169000)
    {
        $profile = 'Middle';
        // $name = "Middle";
        $price = 1;


        $gorod = $town;
        $zip   = $zipcode;

        if($calculator == 'da')
        {
            $summa = $summa/12;
        }

        // file_get_contents (YELP)

        sleep(20);


        // Пополнения
		$term = "Employer";
		$KolEmployer    = 1;
		$KolMagEmployer = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolEmployer, 'kolMag' => $KolMagEmployer );

		$term = "Zelle";
		$KolZelle    = rand(2, 4);
		$KolMagZelle = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolZelle, 'kolMag' => $KolMagZelle );

        $term = "Venmo";
		$KolVenmo    = 1;
		$KolMagVenmo = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolVenmo, 'kolMag' => $KolMagVenmo );

		$term = "CashApp";
		$KolCashApp    = 1;
		$KolMagCashApp = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolCashApp, 'kolMag' => $KolMagCashApp );


        foreach ($Dmassiv as $categ)
        {
        
            $category = $categ['term'];
            $kolTranz = $categ['kolTranz'];
            $kolMag   = $categ['kolMag'];
        

            include 'gen';
        }





        // Траты
		$term = "Grocery_store";
		$KolGrocery    = 6;
		$KolMagGrocery = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolGrocery, 'kolMag' => $KolMagGrocery );

		$term = "Gas_station";
		$KolGas    = rand(4, 6);
		$KolMagGas = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolGas, 'kolMag' => $KolMagGas );

		$term = "Utility";
		$KolUtility    = 1;
		$KolMagUtility = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolUtility, 'kolMag' => $KolMagUtility );

        $term = "Insurance";
		$KolHealthcare    = 1;
		$KolMagHealthcare = 1;  
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolHealthcare, 'kolMag' => $KolMagHealthcare );
       
        $term = "Clothing_store";
		$KolClothing    = 2;
		$KolMagClothing = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolClothing, 'kolMag' => $KolMagClothing );
 
        $term = "Appliances_store";
		$KolAppliances    = 1;
		$KolMagAppliances = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolAppliances, 'kolMag' => $KolMagAppliances );

        $term = "Online_store";
		$KolOnline    = rand(2, 3);
		$KolMagOnline = rand(1, 3);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolOnline, 'kolMag' => $KolMagOnline );

        $term = "Callcenter";
		$KolCallcenter    = 1;
		$KolMagCallcenter = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolCallcenter, 'kolMag' => $KolMagCallcenter );

        $term = "ATM";
		$KolATM    = rand(1, 2);
		$KolMagATM = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolATM, 'kolMag' => $KolMagATM );

        $term = "Middle_Restaurant";
		$KolRestaurant    = rand(2, 3);
		$KolMagRestaurant = rand(1, 3);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolRestaurant, 'kolMag' => $KolMagRestaurant );

        $term = "Bar";
		$KolBar    = 1;
		$KolMagBar = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolBar, 'kolMag' => $KolMagBar );

        $term = "Sport_club";
		$KolSport    = rand(1, 2);
		$KolMagSport = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolSport, 'kolMag' => $KolMagSport );

        $term = "Saving";
		$KolSaving    = rand(1, 2);
		$KolMagSaving = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolSaving, 'kolMag' => $KolMagSaving );

        $term = "SPOTIFY";
		$KolSPOTIFY    = 1;
		$KolMagSPOTIFY = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolSPOTIFY, 'kolMag' => $KolMagSPOTIFY );

        foreach ($Wmassiv as $categ)
        {

            $category = $categ['term'];
            $kolTranz = $categ['kolTranz'];
            $kolMag   = $categ['kolMag'];

            //include 'yelp.php';

            $sql = 'SELECT * FROM yelp where category = :category AND state = :state --';
            $s = $pdo->prepare($sql);
            $s->bindValue(':category', $category);
            $s->bindValue(':state', $state);
            $s->execute();
            $yelp_zapros = $s->fetchAll();
            
            if(!empty($yelp_zapros)) {

                for ($n = 1; $n <= $kolMag; $n++) {

                    $numberMag = array_rand($yelp_zapros);

                    $nameMag  = $yelp_zapros[$numberMag]['name'];
                    $cityMag  = $yelp_zapros[$numberMag]['city'];
                    $stateMag = $yelp_zapros[$numberMag]['state'];
                    
                    //$cityMag  = $yelp_zapros[$numberMag]['location']['city'];
                    //$stateMag = $yelp_zapros[$numberMag]['location']['state'];

                    $catMag[] = array('nameMag' => $nameMag, 'cityMag' => $cityMag, 'stateMag' => $stateMag);
                }
            }
            else {
                
                $sql = 'SELECT * FROM yelp where category = :category --';
                $s = $pdo->prepare($sql);
                $s->bindValue(':category', $category);
                $s->execute();
                $yelp_zapros = $s->fetchAll();

                if(!empty($yelp_zapros)) {

                    for ($n = 1; $n <= $kolMag; $n++) {

                        $numberMag = array_rand($yelp_zapros);

                        $nameMag  = $yelp_zapros[$numberMag]['name'];
                        $cityMag  = $yelp_zapros[$numberMag]['city'];
                        $stateMag = $yelp_zapros[$numberMag]['state'];
                        
                        //$cityMag  = $yelp_zapros[$numberMag]['location']['city'];
                        //$stateMag = $yelp_zapros[$numberMag]['location']['state'];

                        $catMag[] = array('nameMag' => $nameMag, 'cityMag' => $cityMag, 'stateMag' => $stateMag);
                    }
                }
                

                if        ($category == 'Saving') { $catMag[] = array('nameMag' => 'Saving', 'cityMag' => 'Saving', 'stateMag' => 'Saving');  }
                else if   ($category == 'SPOTIFY') { $catMag[] = array('nameMag' => 'SPOTIFY', 'cityMag' => 'SPOTIFY', 'stateMag' => 'SPOTIFY');  }
            }

            include 'gen';
        }
    }
   if ($summa >= 169000 AND $summa <= 300000000)
    {
        $profile = 'Wealthy';
        // $name = "Wealthy";
        $price = 1;


        $gorod = $town;
        $zip   = $zipcode;

        if($calculator == 'da')
        {
            $summa = $summa/12;
        }

        // file_get_contents (YELP)

        sleep(20);



        // Пополнения
		$term = "Employer";
		$KolEmployer    = 1;
		$KolMagEmployer = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolEmployer, 'kolMag' => $KolMagEmployer );

		$term = "Zelle";
		$KolZelle    = rand(2, 4);
		$KolMagZelle = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolZelle, 'kolMag' => $KolMagZelle );

        $term = "Venmo";
		$KolVenmo    = rand(1, 2);
		$KolMagVenmo = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolVenmo, 'kolMag' => $KolMagVenmo );

		$term = "CashApp";
		$KolCashApp    = rand(1, 2);
		$KolMagCashApp = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolCashApp, 'kolMag' => $KolMagCashApp );


        foreach ($Dmassiv as $categ)
        {
        
            $category = $categ['term'];
            $kolTranz = $categ['kolTranz'];
            $kolMag   = $categ['kolMag'];
        

            include 'gen';
        }





        // Траты
		$term = "Grocery_store";
		$KolGrocery    = rand(4, 6);
		$KolMagGrocery = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolGrocery, 'kolMag' => $KolMagGrocery );

		$term = "Gas_station";
		$KolGas    = rand(4, 6);
		$KolMagGas = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolGas, 'kolMag' => $KolMagGas );

		$term = "Utility";
		$KolUtility    = 1;
		$KolMagUtility = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolUtility, 'kolMag' => $KolMagUtility );

        $term = "Insurance";
		$KolHealthcare    = 1;
		$KolMagHealthcare = 1;  
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolHealthcare, 'kolMag' => $KolMagHealthcare );
       
        $term = "Clothing_store";
		$KolClothing    = 2;
		$KolMagClothing = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolClothing, 'kolMag' => $KolMagClothing );
 
        $term = "Appliances_store";
		$KolAppliances    = 1;
		$KolMagAppliances = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolAppliances, 'kolMag' => $KolMagAppliances );

        $term = "Online_store";
		$KolOnline    = rand(2, 3);
		$KolMagOnline = rand(1, 3);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolOnline, 'kolMag' => $KolMagOnline );

        $term = "Callcenter";
		$KolCallcenter    = 1;
		$KolMagCallcenter = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolCallcenter, 'kolMag' => $KolMagCallcenter );

        $term = "ATM";
		$KolATM    = rand(1, 2);
		$KolMagATM = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolATM, 'kolMag' => $KolMagATM );

        $term = "Wealthy_LuxuryRestaurant";
		$KolRestaurant    = 2;
		$KolMagRestaurant = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolRestaurant, 'kolMag' => $KolMagRestaurant );

        $term = "Bar";
		$KolBar    = 1;
		$KolMagBar = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolBar, 'kolMag' => $KolMagBar );

        $term = "Wealthy_sport";
		$KolSport    = rand(1, 2);
		$KolMagSport = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolSport, 'kolMag' => $KolMagSport );

        $term = "Saving";
		$KolSaving    = rand(1, 2);
		$KolMagSaving = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolSaving, 'kolMag' => $KolMagSaving );

        $term = "SPOTIFY";
		$KolSPOTIFY    = 1;
		$KolMagSPOTIFY = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolSPOTIFY, 'kolMag' => $KolMagSPOTIFY );



        foreach ($Wmassiv as $categ)
        {

            $category = $categ['term'];
            $kolTranz = $categ['kolTranz'];
            $kolMag   = $categ['kolMag'];

            //include 'yelp.php';

            $sql = 'SELECT * FROM yelp where category = :category AND state = :state --';
            $s = $pdo->prepare($sql);
            $s->bindValue(':category', $category);
            $s->bindValue(':state', $state);
            $s->execute();
            $yelp_zapros = $s->fetchAll();
            

            if(!empty($yelp_zapros)) {

                for ($n = 1; $n <= $kolMag; $n++) {

                    $numberMag = array_rand($yelp_zapros);

                    $nameMag  = $yelp_zapros[$numberMag]['name'];
                    $cityMag  = $yelp_zapros[$numberMag]['city'];
                    $stateMag = $yelp_zapros[$numberMag]['state'];
                    
                    //$cityMag  = $yelp_zapros[$numberMag]['location']['city'];
                    //$stateMag = $yelp_zapros[$numberMag]['location']['state'];

                    $catMag[] = array('nameMag' => $nameMag, 'cityMag' => $cityMag, 'stateMag' => $stateMag);
                }
            }
            else {
                
                $sql = 'SELECT * FROM yelp where category = :category --';
                $s = $pdo->prepare($sql);
                $s->bindValue(':category', $category);
                $s->execute();
                $yelp_zapros = $s->fetchAll();
                
                if(!empty($yelp_zapros)) {

                    for ($n = 1; $n <= $kolMag; $n++) {

                        $numberMag = array_rand($yelp_zapros);

                        $nameMag  = $yelp_zapros[$numberMag]['name'];
                        $cityMag  = $yelp_zapros[$numberMag]['city'];
                        $stateMag = $yelp_zapros[$numberMag]['state'];
                        
                        //$cityMag  = $yelp_zapros[$numberMag]['location']['city'];
                        //$stateMag = $yelp_zapros[$numberMag]['location']['state'];

                        $catMag[] = array('nameMag' => $nameMag, 'cityMag' => $cityMag, 'stateMag' => $stateMag);
                    }
                }
                

                if        ($category == 'Saving') { $catMag[] = array('nameMag' => 'Saving', 'cityMag' => 'Saving', 'stateMag' => 'Saving');  }
                else if   ($category == 'SPOTIFY') { $catMag[] = array('nameMag' => 'SPOTIFY', 'cityMag' => 'SPOTIFY', 'stateMag' => 'SPOTIFY');  }
            }

            include 'gen';
        }
    }

}
else if($paycheck == 'Weekly')
{

    if ($summa <= 500)
	{
        $profile = 'Poverty';
        // $name = "Poverty Week";
        $price = 1;



        $gorod = $town;
        $zip   = $zipcode;


        if($calculator == 'da')
        {
            $summa = $summa/12;
        }


        // file_get_contents (YELP)

        sleep(20);


        // Пополнения
		$term = "Employer";
		$KolEmployer    = 4;
		$KolMagEmployer = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolEmployer, 'kolMag' => $KolMagEmployer );

		$term = "Zelle";
		$KolZelle    = rand(1, 2);
		$KolMagZelle = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolZelle, 'kolMag' => $KolMagZelle );

        $term = "Venmo";
		$KolVenmo    = rand(1, 2);
		$KolMagVenmo = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolVenmo, 'kolMag' => $KolMagVenmo );

		$term = "CashApp";
		$KolCashApp    = 1;
		$KolMagCashApp = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolCashApp, 'kolMag' => $KolMagCashApp );


        foreach ($Dmassiv as $categ)
        {
        
            $category = $categ['term'];
            $kolTranz = $categ['kolTranz'];
            $kolMag   = $categ['kolMag'];
        

            include 'gen';
        }

        // Траты
		$term = "Grocery_store";
		$KolGrocery    = rand(4, 6);
		$KolMagGrocery = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolGrocery, 'kolMag' => $KolMagGrocery );

		$term = "Gas_station";
		$KolGas    = rand(4, 6);
		$KolMagGas = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolGas, 'kolMag' => $KolMagGas );

		$term = "Utility";
		$KolUtility    = 1;
		$KolMagUtility = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolUtility, 'kolMag' => $KolMagUtility );

        $term = "Insurance";
		$KolHealthcare    = 1;
		$KolMagHealthcare = 1;  
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolHealthcare, 'kolMag' => $KolMagHealthcare );
       
        $term = "Clothing_store";
		$KolClothing    = 2;
		$KolMagClothing = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolClothing, 'kolMag' => $KolMagClothing );
 
        $term = "Appliances_store";
		$KolAppliances    = 1;
		$KolMagAppliances = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolAppliances, 'kolMag' => $KolMagAppliances );

        $term = "Online_store";
		$KolOnline    = rand(2, 3);
		$KolMagOnline = rand(1, 3);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolOnline, 'kolMag' => $KolMagOnline );

        $term = "Callcenter";
		$KolCallcenter    = 1;
		$KolMagCallcenter = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolCallcenter, 'kolMag' => $KolMagCallcenter );

        $term = "ATM";
		$KolATM    = rand(1, 2);
		$KolMagATM = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolATM, 'kolMag' => $KolMagATM );

        foreach ($Wmassiv as $categ)
        {

            $category = $categ['term'];
            $kolTranz = $categ['kolTranz'];
            $kolMag   = $categ['kolMag'];

            //include 'yelp.php';

            $sql = 'SELECT * FROM yelp where category = :category AND state = :state --';
            $s = $pdo->prepare($sql);
            $s->bindValue(':category', $category);
            $s->bindValue(':state', $state);
            $s->execute();
            $yelp_zapros = $s->fetchAll();
            

            if(!empty($yelp_zapros)) {

                for ($n = 1; $n <= $kolMag; $n++) {

                    $numberMag = array_rand($yelp_zapros);

                    $nameMag  = $yelp_zapros[$numberMag]['name'];
                    $cityMag  = $yelp_zapros[$numberMag]['city'];
                    $stateMag = $yelp_zapros[$numberMag]['state'];
                    
                    //$cityMag  = $yelp_zapros[$numberMag]['location']['city'];
                    //$stateMag = $yelp_zapros[$numberMag]['location']['state'];

                    $catMag[] = array('nameMag' => $nameMag, 'cityMag' => $cityMag, 'stateMag' => $stateMag);
                }
            }
            else {
                
                $sql = 'SELECT * FROM yelp where category = :category --';
                $s = $pdo->prepare($sql);
                $s->bindValue(':category', $category);
                $s->execute();
                $yelp_zapros = $s->fetchAll();

                for ($n = 1; $n <= $kolMag; $n++) {

                    $numberMag = array_rand($yelp_zapros);

                    $nameMag  = $yelp_zapros[$numberMag]['name'];
                    $cityMag  = $yelp_zapros[$numberMag]['city'];
                    $stateMag = $yelp_zapros[$numberMag]['state'];
                    
                    //$cityMag  = $yelp_zapros[$numberMag]['location']['city'];
                    //$stateMag = $yelp_zapros[$numberMag]['location']['state'];

                    $catMag[] = array('nameMag' => $nameMag, 'cityMag' => $cityMag, 'stateMag' => $stateMag);
                }
                

                if        ($category == 'Saving') { $catMag[] = array('nameMag' => 'Saving', 'cityMag' => 'Saving', 'stateMag' => 'Saving');  }
                else if   ($category == 'SPOTIFY') { $catMag[] = array('nameMag' => 'SPOTIFY', 'cityMag' => 'SPOTIFY', 'stateMag' => 'SPOTIFY');  }
            }
                include 'gen';
        }

	}
    if ($summa >= 501 AND $summa < 950)
    {
        $profile = 'Poor';
        // $name = "Poor week";
        $price = 1;


        $gorod = $town;
        $zip   = $zipcode;

        if($calculator == 'da')
        {
            $summa = $summa/12;
        }

        // file_get_contents (YELP)

        sleep(20);



        // Пополнения
		$term = "Employer";
		$KolEmployer    = 4;
		$KolMagEmployer = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolEmployer, 'kolMag' => $KolMagEmployer );

		$term = "Zelle";
		$KolZelle    = rand(2, 3);
		$KolMagZelle = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolZelle, 'kolMag' => $KolMagZelle );

        $term = "Venmo";
		$KolVenmo    = rand(1, 2);
		$KolMagVenmo = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolVenmo, 'kolMag' => $KolMagVenmo );

		$term = "CashApp";
		$KolCashApp    = 1;
		$KolMagCashApp = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolCashApp, 'kolMag' => $KolMagCashApp );


        foreach ($Dmassiv as $categ)
        {
        
            $category = $categ['term'];
            $kolTranz = $categ['kolTranz'];
            $kolMag   = $categ['kolMag'];
        

            include 'gen';
        }


        // Траты
		$term = "Grocery_store";
		$KolGrocery    = rand(4, 5);
		$KolMagGrocery = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolGrocery, 'kolMag' => $KolMagGrocery );

		$term = "Gas_station";
		$KolGas    = rand(4, 5);
		$KolMagGas = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolGas, 'kolMag' => $KolMagGas );

		$term = "Utility";
		$KolUtility    = 1;
		$KolMagUtility = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolUtility, 'kolMag' => $KolMagUtility );

        $term = "Insurance";
		$KolHealthcare    = 1;
		$KolMagHealthcare = 1;  
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolHealthcare, 'kolMag' => $KolMagHealthcare );
       
        $term = "Clothing_store";
		$KolClothing    = 2;
		$KolMagClothing = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolClothing, 'kolMag' => $KolMagClothing );
 
        $term = "Appliances_store";
		$KolAppliances    = 1;
		$KolMagAppliances = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolAppliances, 'kolMag' => $KolMagAppliances );

        $term = "Online_store";
		$KolOnline    = rand(2, 3);
		$KolMagOnline = rand(1, 3);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolOnline, 'kolMag' => $KolMagOnline );

        $term = "Callcenter";
		$KolCallcenter    = 1;
		$KolMagCallcenter = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolCallcenter, 'kolMag' => $KolMagCallcenter );

        $term = "ATM";
		$KolATM    = rand(1, 2);
		$KolMagATM = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolATM, 'kolMag' => $KolMagATM );

        $term = "Poor_cafes";
		$KolCafes    = 2;
		$KolMagCafes = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolCafes, 'kolMag' => $KolMagCafes );

        $term = "Bar";
		$KolBar    = 1;
		$KolMagBar = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolBar, 'kolMag' => $KolMagBar );


        foreach ($Wmassiv as $categ)
        {

            $category = $categ['term'];
            $kolTranz = $categ['kolTranz'];
            $kolMag   = $categ['kolMag'];

            //include 'yelp.php';

            $sql = 'SELECT * FROM yelp where category = :category AND state = :state --';
            $s = $pdo->prepare($sql);
            $s->bindValue(':category', $category);
            $s->bindValue(':state', $state);
            $s->execute();
            $yelp_zapros = $s->fetchAll();
            

            if(!empty($yelp_zapros)) {

                for ($n = 1; $n <= $kolMag; $n++) {

                    $numberMag = array_rand($yelp_zapros);

                    $nameMag  = $yelp_zapros[$numberMag]['name'];
                    $cityMag  = $yelp_zapros[$numberMag]['city'];
                    $stateMag = $yelp_zapros[$numberMag]['state'];
                    
                    //$cityMag  = $yelp_zapros[$numberMag]['location']['city'];
                    //$stateMag = $yelp_zapros[$numberMag]['location']['state'];

                    $catMag[] = array('nameMag' => $nameMag, 'cityMag' => $cityMag, 'stateMag' => $stateMag);
                }
            }
            else {
                
                $sql = 'SELECT * FROM yelp where category = :category --';
                $s = $pdo->prepare($sql);
                $s->bindValue(':category', $category);
                $s->execute();
                $yelp_zapros = $s->fetchAll();

                for ($n = 1; $n <= $kolMag; $n++) {

                    $numberMag = array_rand($yelp_zapros);

                    $nameMag  = $yelp_zapros[$numberMag]['name'];
                    $cityMag  = $yelp_zapros[$numberMag]['city'];
                    $stateMag = $yelp_zapros[$numberMag]['state'];
                    
                    //$cityMag  = $yelp_zapros[$numberMag]['location']['city'];
                    //$stateMag = $yelp_zapros[$numberMag]['location']['state'];

                    $catMag[] = array('nameMag' => $nameMag, 'cityMag' => $cityMag, 'stateMag' => $stateMag);
                }
                

                if        ($category == 'Saving') { $catMag[] = array('nameMag' => 'Saving', 'cityMag' => 'Saving', 'stateMag' => 'Saving');  }
                else if   ($category == 'SPOTIFY') { $catMag[] = array('nameMag' => 'SPOTIFY', 'cityMag' => 'SPOTIFY', 'stateMag' => 'SPOTIFY');  }
            }
                include 'gen';
        }



    }
    if ($summa >= 950 AND $summa < 2100)
    {
        $profile = 'Middle';
        // $name = "Middle week";
        $price = 2;


        $gorod = $town;
        $zip   = $zipcode;

        if($calculator == 'da')
        {
            $summa = $summa/12;
        }

        // file_get_contents (YELP)

        sleep(20);


        // Пополнения
		$term = "Employer";
		$KolEmployer    = 4;
		$KolMagEmployer = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolEmployer, 'kolMag' => $KolMagEmployer );

		$term = "Zelle";
		$KolZelle    = rand(2, 3);
		$KolMagZelle = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolZelle, 'kolMag' => $KolMagZelle );

        $term = "Venmo";
		$KolVenmo    = 1;
		$KolMagVenmo = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolVenmo, 'kolMag' => $KolMagVenmo );

		$term = "CashApp";
		$KolCashApp    = 1;
		$KolMagCashApp = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolCashApp, 'kolMag' => $KolMagCashApp );


        foreach ($Dmassiv as $categ)
        {
        
            $category = $categ['term'];
            $kolTranz = $categ['kolTranz'];
            $kolMag   = $categ['kolMag'];
        

            include 'gen';
        }





        // Траты
		$term = "Grocery_store";
		$KolGrocery    = rand(4, 6);
		$KolMagGrocery = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolGrocery, 'kolMag' => $KolMagGrocery );

		$term = "Gas_station";
		$KolGas    = rand(4, 6);
		$KolMagGas = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolGas, 'kolMag' => $KolMagGas );

		$term = "Utility";
		$KolUtility    = 1;
		$KolMagUtility = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolUtility, 'kolMag' => $KolMagUtility );

        $term = "Insurance";
		$KolHealthcare    = 1;
		$KolMagHealthcare = 1;  
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolHealthcare, 'kolMag' => $KolMagHealthcare );
       
        $term = "Clothing_store";
		$KolClothing    = 2;
		$KolMagClothing = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolClothing, 'kolMag' => $KolMagClothing );
 
        $term = "Appliances_store";
		$KolAppliances    = 1;
		$KolMagAppliances = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolAppliances, 'kolMag' => $KolMagAppliances );

        $term = "Online_store";
		$KolOnline    = rand(2, 3);
		$KolMagOnline = rand(1, 3);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolOnline, 'kolMag' => $KolMagOnline );

        $term = "Callcenter";
		$KolCallcenter    = 1;
		$KolMagCallcenter = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolCallcenter, 'kolMag' => $KolMagCallcenter );

        $term = "ATM";
		$KolATM    = rand(1, 2);
		$KolMagATM = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolATM, 'kolMag' => $KolMagATM );

        $term = "Middle_Restaurant";
		$KolRestaurant    = rand(2, 3);
		$KolMagRestaurant = rand(1, 3);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolRestaurant, 'kolMag' => $KolMagRestaurant );

        $term = "Bar";
		$KolBar    = 1;
		$KolMagBar = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolBar, 'kolMag' => $KolMagBar );

        $term = "Sport_club";
		$KolSport    = rand(1, 2);
		$KolMagSport = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolSport, 'kolMag' => $KolMagSport );

        $term = "Saving";
		$KolSaving    = rand(1, 2);
		$KolMagSaving = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolSaving, 'kolMag' => $KolMagSaving );

        $term = "SPOTIFY";
		$KolSPOTIFY    = 1;
		$KolMagSPOTIFY = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolSPOTIFY, 'kolMag' => $KolMagSPOTIFY );

        foreach ($Wmassiv as $categ)
        {

            $category = $categ['term'];
            $kolTranz = $categ['kolTranz'];
            $kolMag   = $categ['kolMag'];

            //include 'yelp.php';

            $sql = 'SELECT * FROM yelp where category = :category AND state = :state --';
            $s = $pdo->prepare($sql);
            $s->bindValue(':category', $category);
            $s->bindValue(':state', $state);
            $s->execute();
            $yelp_zapros = $s->fetchAll();
            
            if(!empty($yelp_zapros)) {

                for ($n = 1; $n <= $kolMag; $n++) {

                    $numberMag = array_rand($yelp_zapros);

                    $nameMag  = $yelp_zapros[$numberMag]['name'];
                    $cityMag  = $yelp_zapros[$numberMag]['city'];
                    $stateMag = $yelp_zapros[$numberMag]['state'];
                    
                    //$cityMag  = $yelp_zapros[$numberMag]['location']['city'];
                    //$stateMag = $yelp_zapros[$numberMag]['location']['state'];

                    $catMag[] = array('nameMag' => $nameMag, 'cityMag' => $cityMag, 'stateMag' => $stateMag);
                }
            }
            else {
                
                $sql = 'SELECT * FROM yelp where category = :category --';
                $s = $pdo->prepare($sql);
                $s->bindValue(':category', $category);
                $s->execute();
                $yelp_zapros = $s->fetchAll();

                for ($n = 1; $n <= $kolMag; $n++) {

                    $numberMag = array_rand($yelp_zapros);

                    $nameMag  = $yelp_zapros[$numberMag]['name'];
                    $cityMag  = $yelp_zapros[$numberMag]['city'];
                    $stateMag = $yelp_zapros[$numberMag]['state'];
                    
                    //$cityMag  = $yelp_zapros[$numberMag]['location']['city'];
                    //$stateMag = $yelp_zapros[$numberMag]['location']['state'];

                    $catMag[] = array('nameMag' => $nameMag, 'cityMag' => $cityMag, 'stateMag' => $stateMag);
                }
                

                if        ($category == 'Saving') { $catMag[] = array('nameMag' => 'Saving', 'cityMag' => 'Saving', 'stateMag' => 'Saving');  }
                else if   ($category == 'SPOTIFY') { $catMag[] = array('nameMag' => 'SPOTIFY', 'cityMag' => 'SPOTIFY', 'stateMag' => 'SPOTIFY');  }
            }

            include 'gen';
        }
    }
    if ($summa >= 2100 AND $summa <= 4000000)
    {
        $profile = 'Wealthy';
        // $name = "Wealthy week";
        $price = 1;



        $gorod = $town;
        $zip   = $zipcode;

        if($calculator == 'da')
        {
            $summa = $summa/12;
        }

        // file_get_contents (YELP)

        sleep(20);



        // Пополнения
		$term = "Employer";
		$KolEmployer    = 4;
		$KolMagEmployer = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolEmployer, 'kolMag' => $KolMagEmployer );

		$term = "Zelle";
		$KolZelle    = rand(1, 2);
		$KolMagZelle = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolZelle, 'kolMag' => $KolMagZelle );

        $term = "Venmo";
		$KolVenmo    = rand(1, 2);
		$KolMagVenmo = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolVenmo, 'kolMag' => $KolMagVenmo );

		$term = "CashApp";
		$KolCashApp    = 1;
		$KolMagCashApp = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolCashApp, 'kolMag' => $KolMagCashApp );


        foreach ($Dmassiv as $categ)
        {
        
            $category = $categ['term'];
            $kolTranz = $categ['kolTranz'];
            $kolMag   = $categ['kolMag'];
        

            include 'gen';
        }





        // Траты
		$term = "Grocery_store";
		$KolGrocery    = rand(4, 5);
		$KolMagGrocery = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolGrocery, 'kolMag' => $KolMagGrocery );

		$term = "Gas_station";
		$KolGas    = rand(4, 5);
		$KolMagGas = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolGas, 'kolMag' => $KolMagGas );

		$term = "Utility";
		$KolUtility    = 1;
		$KolMagUtility = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolUtility, 'kolMag' => $KolMagUtility );

        $term = "Insurance";
		$KolHealthcare    = 1;
		$KolMagHealthcare = 1;  
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolHealthcare, 'kolMag' => $KolMagHealthcare );
       
        $term = "Clothing_store";
		$KolClothing    = 2;
		$KolMagClothing = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolClothing, 'kolMag' => $KolMagClothing );
 
        $term = "Appliances_store";
		$KolAppliances    = 1;
		$KolMagAppliances = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolAppliances, 'kolMag' => $KolMagAppliances );

        $term = "Online_store";
		$KolOnline    = rand(2, 3);
		$KolMagOnline = rand(1, 3);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolOnline, 'kolMag' => $KolMagOnline );

        $term = "Callcenter";
		$KolCallcenter    = 1;
		$KolMagCallcenter = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolCallcenter, 'kolMag' => $KolMagCallcenter );

        $term = "ATM";
		$KolATM    = rand(1, 2);
		$KolMagATM = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolATM, 'kolMag' => $KolMagATM );

        $term = "Wealthy_LuxuryRestaurant";
		$KolRestaurant    = 2;
		$KolMagRestaurant = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolRestaurant, 'kolMag' => $KolMagRestaurant );

        $term = "Bar";
		$KolBar    = 1;
		$KolMagBar = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolBar, 'kolMag' => $KolMagBar );

        $term = "Wealthy_sport";
		$KolSport    = rand(1, 2);
		$KolMagSport = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolSport, 'kolMag' => $KolMagSport );

        $term = "Saving";
		$KolSaving    = rand(1, 2);
		$KolMagSaving = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolSaving, 'kolMag' => $KolMagSaving );

        $term = "SPOTIFY";
		$KolSPOTIFY    = 1;
		$KolMagSPOTIFY = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolSPOTIFY, 'kolMag' => $KolMagSPOTIFY );



        foreach ($Wmassiv as $categ)
        {

            $category = $categ['term'];
            $kolTranz = $categ['kolTranz'];
            $kolMag   = $categ['kolMag'];

            //include 'yelp.php';

            $sql = 'SELECT * FROM yelp where category = :category AND state = :state --';
            $s = $pdo->prepare($sql);
            $s->bindValue(':category', $category);
            $s->bindValue(':state', $state);
            $s->execute();
            $yelp_zapros = $s->fetchAll();
            

            if(!empty($yelp_zapros)) {

                for ($n = 1; $n <= $kolMag; $n++) {

                    $numberMag = array_rand($yelp_zapros);

                    $nameMag  = $yelp_zapros[$numberMag]['name'];
                    $cityMag  = $yelp_zapros[$numberMag]['city'];
                    $stateMag = $yelp_zapros[$numberMag]['state'];
                    
                    //$cityMag  = $yelp_zapros[$numberMag]['location']['city'];
                    //$stateMag = $yelp_zapros[$numberMag]['location']['state'];

                    $catMag[] = array('nameMag' => $nameMag, 'cityMag' => $cityMag, 'stateMag' => $stateMag);
                }
            }
            else {
                
                $sql = 'SELECT * FROM yelp where category = :category --';
                $s = $pdo->prepare($sql);
                $s->bindValue(':category', $category);
                $s->execute();
                $yelp_zapros = $s->fetchAll();

                if(!empty($yelp_zapros)) {

                    for ($n = 1; $n <= $kolMag; $n++) {
    
                        $numberMag = array_rand($yelp_zapros);
    
                        $nameMag  = $yelp_zapros[$numberMag]['name'];
                        $cityMag  = $yelp_zapros[$numberMag]['city'];
                        $stateMag = $yelp_zapros[$numberMag]['state'];
                        
                        //$cityMag  = $yelp_zapros[$numberMag]['location']['city'];
                        //$stateMag = $yelp_zapros[$numberMag]['location']['state'];
    
                        $catMag[] = array('nameMag' => $nameMag, 'cityMag' => $cityMag, 'stateMag' => $stateMag);
                    }
                }
                

                if        ($category == 'Saving') { $catMag[] = array('nameMag' => 'Saving', 'cityMag' => 'Saving', 'stateMag' => 'Saving');  }
                else if   ($category == 'SPOTIFY') { $catMag[] = array('nameMag' => 'SPOTIFY', 'cityMag' => 'SPOTIFY', 'stateMag' => 'SPOTIFY');  }
            }

            include 'gen';
        }
    }

}
else if($paycheck == 'Bi-weekly')
{

    if ($summa <= 1000)
	{
        $profile = 'Poverty';
        // $name = "Poverty Bi-Week";
        $price = 1;



        $gorod = $town;
        $zip   = $zipcode;

        if($calculator == 'da')
        {
            $summa = $summa/12;
        }

        // file_get_contents (YELP)

        sleep(20);



        // Пополнения
		$term = "Employer";
		$KolEmployer    = 2;
		$KolMagEmployer = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolEmployer, 'kolMag' => $KolMagEmployer );

		$term = "Zelle";
		$KolZelle    = rand(1, 3);
		$KolMagZelle = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolZelle, 'kolMag' => $KolMagZelle );

        $term = "Venmo";
		$KolVenmo    = rand(1, 2);
		$KolMagVenmo = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolVenmo, 'kolMag' => $KolMagVenmo );

		$term = "CashApp";
		$KolCashApp    = 1;
		$KolMagCashApp = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolCashApp, 'kolMag' => $KolMagCashApp );


        foreach ($Dmassiv as $categ)
        {
        
            $category = $categ['term'];
            $kolTranz = $categ['kolTranz'];
            $kolMag   = $categ['kolMag'];
        

            include 'gen';
        }

        // Траты
		$term = "Grocery_store";
		$KolGrocery    = rand(4, 6);
		$KolMagGrocery = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolGrocery, 'kolMag' => $KolMagGrocery );

		$term = "Gas_station";
		$KolGas    = rand(4, 6);
		$KolMagGas = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolGas, 'kolMag' => $KolMagGas );

		$term = "Utility";
		$KolUtility    = 1;
		$KolMagUtility = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolUtility, 'kolMag' => $KolMagUtility );

        $term = "Insurance";
		$KolHealthcare    = 1;
		$KolMagHealthcare = 1;  
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolHealthcare, 'kolMag' => $KolMagHealthcare );
       
        $term = "Clothing_store";
		$KolClothing    = 2;
		$KolMagClothing = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolClothing, 'kolMag' => $KolMagClothing );
 
        $term = "Appliances_store";
		$KolAppliances    = 1;
		$KolMagAppliances = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolAppliances, 'kolMag' => $KolMagAppliances );

        $term = "Online_store";
		$KolOnline    = rand(2, 3);
		$KolMagOnline = rand(1, 3);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolOnline, 'kolMag' => $KolMagOnline );

        $term = "Callcenter";
		$KolCallcenter    = 1;
		$KolMagCallcenter = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolCallcenter, 'kolMag' => $KolMagCallcenter );

        $term = "ATM";
		$KolATM    = rand(1, 2);
		$KolMagATM = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolATM, 'kolMag' => $KolMagATM );

        foreach ($Wmassiv as $categ)
        {

            $category = $categ['term'];
            $kolTranz = $categ['kolTranz'];
            $kolMag   = $categ['kolMag'];

            //include 'yelp.php';

            $sql = 'SELECT * FROM yelp where category = :category AND state = :state --';
            $s = $pdo->prepare($sql);
            $s->bindValue(':category', $category);
            $s->bindValue(':state', $state);
            $s->execute();
            $yelp_zapros = $s->fetchAll();
            

            if(!empty($yelp_zapros)) {

                for ($n = 1; $n <= $kolMag; $n++) {

                    $numberMag = array_rand($yelp_zapros);

                    $nameMag  = $yelp_zapros[$numberMag]['name'];
                    $cityMag  = $yelp_zapros[$numberMag]['city'];
                    $stateMag = $yelp_zapros[$numberMag]['state'];
                    
                    //$cityMag  = $yelp_zapros[$numberMag]['location']['city'];
                    //$stateMag = $yelp_zapros[$numberMag]['location']['state'];

                    $catMag[] = array('nameMag' => $nameMag, 'cityMag' => $cityMag, 'stateMag' => $stateMag);
                }
            }
            else {
                
                $sql = 'SELECT * FROM yelp where category = :category --';
                $s = $pdo->prepare($sql);
                $s->bindValue(':category', $category);
                $s->execute();
                $yelp_zapros = $s->fetchAll();

                for ($n = 1; $n <= $kolMag; $n++) {

                    $numberMag = array_rand($yelp_zapros);

                    $nameMag  = $yelp_zapros[$numberMag]['name'];
                    $cityMag  = $yelp_zapros[$numberMag]['city'];
                    $stateMag = $yelp_zapros[$numberMag]['state'];
                    
                    //$cityMag  = $yelp_zapros[$numberMag]['location']['city'];
                    //$stateMag = $yelp_zapros[$numberMag]['location']['state'];

                    $catMag[] = array('nameMag' => $nameMag, 'cityMag' => $cityMag, 'stateMag' => $stateMag);
                }
                

                if        ($category == 'Saving') { $catMag[] = array('nameMag' => 'Saving', 'cityMag' => 'Saving', 'stateMag' => 'Saving');  }
                else if   ($category == 'SPOTIFY') { $catMag[] = array('nameMag' => 'SPOTIFY', 'cityMag' => 'SPOTIFY', 'stateMag' => 'SPOTIFY');  }
            }
                include 'gen';
        }

	}
    if ($summa >= 1001 AND $summa < 1900)
    {
        $profile = 'Poor';
        // $name = "Poor Bi-week";
        $price = 1;


        $gorod = $town;
        $zip   = $zipcode;

        if($calculator == 'da')
        {
            $summa = $summa/12;
        }

        // file_get_contents (YELP)

        sleep(20);


        // Пополнения
		$term = "Employer";
		$KolEmployer    = 2;
		$KolMagEmployer = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolEmployer, 'kolMag' => $KolMagEmployer );

		$term = "Zelle";
		$KolZelle    = rand(2, 3);
		$KolMagZelle = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolZelle, 'kolMag' => $KolMagZelle );

        $term = "Venmo";
		$KolVenmo    = rand(1, 2);
		$KolMagVenmo = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolVenmo, 'kolMag' => $KolMagVenmo );

		$term = "CashApp";
		$KolCashApp    = 1;
		$KolMagCashApp = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolCashApp, 'kolMag' => $KolMagCashApp );


        foreach ($Dmassiv as $categ)
        {
        
            $category = $categ['term'];
            $kolTranz = $categ['kolTranz'];
            $kolMag   = $categ['kolMag'];
        

            include 'gen';
        }


        // Траты
		$term = "Grocery_store";
		$KolGrocery    = rand(4, 5);
		$KolMagGrocery = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolGrocery, 'kolMag' => $KolMagGrocery );

		$term = "Gas_station";
		$KolGas    = rand(4, 5);
		$KolMagGas = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolGas, 'kolMag' => $KolMagGas );

		$term = "Utility";
		$KolUtility    = 1;
		$KolMagUtility = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolUtility, 'kolMag' => $KolMagUtility );

        $term = "Insurance";
		$KolHealthcare    = 1;
		$KolMagHealthcare = 1;  
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolHealthcare, 'kolMag' => $KolMagHealthcare );
       
        $term = "Clothing_store";
		$KolClothing    = 2;
		$KolMagClothing = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolClothing, 'kolMag' => $KolMagClothing );
 
        $term = "Appliances_store";
		$KolAppliances    = 1;
		$KolMagAppliances = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolAppliances, 'kolMag' => $KolMagAppliances );

        $term = "Online_store";
		$KolOnline    = rand(2, 3);
		$KolMagOnline = rand(1, 3);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolOnline, 'kolMag' => $KolMagOnline );

        $term = "Callcenter";
		$KolCallcenter    = 1;
		$KolMagCallcenter = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolCallcenter, 'kolMag' => $KolMagCallcenter );

        $term = "ATM";
		$KolATM    = rand(1, 2);
		$KolMagATM = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolATM, 'kolMag' => $KolMagATM );

        $term = "Poor_cafes";
		$KolCafes    = 2;
		$KolMagCafes = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolCafes, 'kolMag' => $KolMagCafes );

        $term = "Bar";
		$KolBar    = 1;
		$KolMagBar = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolBar, 'kolMag' => $KolMagBar );
/*
*/

        foreach ($Wmassiv as $categ)
        {

            $category = $categ['term'];
            $kolTranz = $categ['kolTranz'];
            $kolMag   = $categ['kolMag'];

            //include 'yelp.php';

            $sql = 'SELECT * FROM yelp where category = :category AND state = :state --';
            $s = $pdo->prepare($sql);
            $s->bindValue(':category', $category);
            $s->bindValue(':state', $state);
            $s->execute();
            $yelp_zapros = $s->fetchAll();
            

            if(!empty($yelp_zapros)) {

                for ($n = 1; $n <= $kolMag; $n++) {

                    $numberMag = array_rand($yelp_zapros);

                    $nameMag  = $yelp_zapros[$numberMag]['name'];
                    $cityMag  = $yelp_zapros[$numberMag]['city'];
                    $stateMag = $yelp_zapros[$numberMag]['state'];
                    
                    //$cityMag  = $yelp_zapros[$numberMag]['location']['city'];
                    //$stateMag = $yelp_zapros[$numberMag]['location']['state'];

                    $catMag[] = array('nameMag' => $nameMag, 'cityMag' => $cityMag, 'stateMag' => $stateMag);
                }
            }
            else {
                
                $sql = 'SELECT * FROM yelp where category = :category --';
                $s = $pdo->prepare($sql);
                $s->bindValue(':category', $category);
                $s->execute();
                $yelp_zapros = $s->fetchAll();

                for ($n = 1; $n <= $kolMag; $n++) {

                    $numberMag = array_rand($yelp_zapros);

                    $nameMag  = $yelp_zapros[$numberMag]['name'];
                    $cityMag  = $yelp_zapros[$numberMag]['city'];
                    $stateMag = $yelp_zapros[$numberMag]['state'];
                    
                    //$cityMag  = $yelp_zapros[$numberMag]['location']['city'];
                    //$stateMag = $yelp_zapros[$numberMag]['location']['state'];

                    $catMag[] = array('nameMag' => $nameMag, 'cityMag' => $cityMag, 'stateMag' => $stateMag);
                }

            }
                include 'gen';
        }



    }
    if ($summa >= 1900 AND $summa < 4300)
    {
        $profile = 'Middle';
        // $name = "Middle Bi-week";
        $price = 2;


        $gorod = $town;
        $zip   = $zipcode;

        if($calculator == 'da')
        {
            $summa = $summa/12;
        }

        // file_get_contents (YELP)

        sleep(20);



        // Пополнения
		$term = "Employer";
		$KolEmployer    = 2;
		$KolMagEmployer = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolEmployer, 'kolMag' => $KolMagEmployer );

		$term = "Zelle";
		$KolZelle    = rand(1, 3);
		$KolMagZelle = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolZelle, 'kolMag' => $KolMagZelle );

        $term = "Venmo";
		$KolVenmo    = 1;
		$KolMagVenmo = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolVenmo, 'kolMag' => $KolMagVenmo );

		$term = "CashApp";
		$KolCashApp    = 1;
		$KolMagCashApp = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolCashApp, 'kolMag' => $KolMagCashApp );


        foreach ($Dmassiv as $categ)
        {
        
            $category = $categ['term'];
            $kolTranz = $categ['kolTranz'];
            $kolMag   = $categ['kolMag'];
        

            include 'gen';
        }





        // Траты
		$term = "Grocery_store";
		$KolGrocery    = rand(4, 5);
		$KolMagGrocery = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolGrocery, 'kolMag' => $KolMagGrocery );

		$term = "Gas_station";
		$KolGas    = rand(4, 5);
		$KolMagGas = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolGas, 'kolMag' => $KolMagGas );

		$term = "Utility";
		$KolUtility    = 1;
		$KolMagUtility = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolUtility, 'kolMag' => $KolMagUtility );

        $term = "Insurance";
		$KolHealthcare    = 1;
		$KolMagHealthcare = 1;  
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolHealthcare, 'kolMag' => $KolMagHealthcare );
       
        $term = "Clothing_store";
		$KolClothing    = 2;
		$KolMagClothing = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolClothing, 'kolMag' => $KolMagClothing );
 
        $term = "Appliances_store";
		$KolAppliances    = 1;
		$KolMagAppliances = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolAppliances, 'kolMag' => $KolMagAppliances );

        $term = "Online_store";
		$KolOnline    = rand(2, 3);
		$KolMagOnline = rand(1, 3);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolOnline, 'kolMag' => $KolMagOnline );

        $term = "Callcenter";
		$KolCallcenter    = 1;
		$KolMagCallcenter = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolCallcenter, 'kolMag' => $KolMagCallcenter );

        $term = "ATM";
		$KolATM    = rand(1, 2);
		$KolMagATM = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolATM, 'kolMag' => $KolMagATM );

        $term = "Middle_Restaurant";
		$KolRestaurant    = rand(2, 3);
		$KolMagRestaurant = rand(1, 3);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolRestaurant, 'kolMag' => $KolMagRestaurant );

        $term = "Bar";
		$KolBar    = 1;
		$KolMagBar = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolBar, 'kolMag' => $KolMagBar );

        $term = "Sport_club";
		$KolSport    = rand(1, 2);
		$KolMagSport = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolSport, 'kolMag' => $KolMagSport );

        $term = "Saving";
		$KolSaving    = rand(1, 2);
		$KolMagSaving = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolSaving, 'kolMag' => $KolMagSaving );

        $term = "SPOTIFY";
		$KolSPOTIFY    = 1;
		$KolMagSPOTIFY = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolSPOTIFY, 'kolMag' => $KolMagSPOTIFY );

        foreach ($Wmassiv as $categ)
        {

            $category = $categ['term'];
            $kolTranz = $categ['kolTranz'];
            $kolMag   = $categ['kolMag'];

            //include 'yelp.php';

            $sql = 'SELECT * FROM yelp where category = :category AND state = :state --';
            $s = $pdo->prepare($sql);
            $s->bindValue(':category', $category);
            $s->bindValue(':state', $state);
            $s->execute();
            $yelp_zapros = $s->fetchAll();
            
            if(!empty($yelp_zapros)) {

                for ($n = 1; $n <= $kolMag; $n++) {

                    $numberMag = array_rand($yelp_zapros);

                    $nameMag  = $yelp_zapros[$numberMag]['name'];
                    $cityMag  = $yelp_zapros[$numberMag]['city'];
                    $stateMag = $yelp_zapros[$numberMag]['state'];
                    
                    //$cityMag  = $yelp_zapros[$numberMag]['location']['city'];
                    //$stateMag = $yelp_zapros[$numberMag]['location']['state'];

                    $catMag[] = array('nameMag' => $nameMag, 'cityMag' => $cityMag, 'stateMag' => $stateMag);
                }
            }
            else {
                
                $sql = 'SELECT * FROM yelp where category = :category --';
                $s = $pdo->prepare($sql);
                $s->bindValue(':category', $category);
                $s->execute();
                $yelp_zapros = $s->fetchAll();

                if(!empty($yelp_zapros)) {

                    for ($n = 1; $n <= $kolMag; $n++) {
    
                        $numberMag = array_rand($yelp_zapros);
    
                        $nameMag  = $yelp_zapros[$numberMag]['name'];
                        $cityMag  = $yelp_zapros[$numberMag]['city'];
                        $stateMag = $yelp_zapros[$numberMag]['state'];
                        
                        //$cityMag  = $yelp_zapros[$numberMag]['location']['city'];
                        //$stateMag = $yelp_zapros[$numberMag]['location']['state'];
    
                        $catMag[] = array('nameMag' => $nameMag, 'cityMag' => $cityMag, 'stateMag' => $stateMag);
                    }
                }
                

                if        ($category == 'Saving') { $catMag[] = array('nameMag' => 'Saving', 'cityMag' => 'Saving', 'stateMag' => 'Saving');  }
                else if   ($category == 'SPOTIFY') { $catMag[] = array('nameMag' => 'SPOTIFY', 'cityMag' => 'SPOTIFY', 'stateMag' => 'SPOTIFY');  }
            }

            include 'gen';
        }
    }
    if ($summa >= 4300 AND $summa <= 8000000)
    {
        $profile = 'Wealthy';
        // $name = "Wealthy Bi-week";
        $price = 3;



        $gorod = $town;
        $zip   = $zipcode;

        if($calculator == 'da')
        {
            $summa = $summa/12;
        }
        
        // file_get_contents (YELP)

        sleep(20);


        // Пополнения
		$term = "Employer";
		$KolEmployer    = 2;
		$KolMagEmployer = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolEmployer, 'kolMag' => $KolMagEmployer );

		$term = "Zelle";
		$KolZelle    = rand(1, 2);
		$KolMagZelle = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolZelle, 'kolMag' => $KolMagZelle );

        $term = "Venmo";
		$KolVenmo    = rand(1, 2);
		$KolMagVenmo = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolVenmo, 'kolMag' => $KolMagVenmo );

		$term = "CashApp";
		$KolCashApp    = rand(1, 2);
		$KolMagCashApp = 1;
        $Dmassiv[] = array('term' => $term, 'kolTranz' => $KolCashApp, 'kolMag' => $KolMagCashApp );


        foreach ($Dmassiv as $categ)
        {
        
            $category = $categ['term'];
            $kolTranz = $categ['kolTranz'];
            $kolMag   = $categ['kolMag'];
        

            include 'gen';
        }





        // Траты
		$term = "Grocery_store";
		$KolGrocery    = rand(4, 5);
		$KolMagGrocery = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolGrocery, 'kolMag' => $KolMagGrocery );

		$term = "Gas_station";
		$KolGas    = rand(4, 5);
		$KolMagGas = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolGas, 'kolMag' => $KolMagGas );

		$term = "Utility";
		$KolUtility    = 1;
		$KolMagUtility = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolUtility, 'kolMag' => $KolMagUtility );

        $term = "Insurance";
		$KolHealthcare    = 1;
		$KolMagHealthcare = 1;  
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolHealthcare, 'kolMag' => $KolMagHealthcare );
       
        $term = "Clothing_store";
		$KolClothing    = 2;
		$KolMagClothing = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolClothing, 'kolMag' => $KolMagClothing );
 
        $term = "Appliances_store";
		$KolAppliances    = 1;
		$KolMagAppliances = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolAppliances, 'kolMag' => $KolMagAppliances );

        $term = "Online_store";
		$KolOnline    = rand(2, 3);
		$KolMagOnline = rand(1, 3);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolOnline, 'kolMag' => $KolMagOnline );

        $term = "Callcenter";
		$KolCallcenter    = 1;
		$KolMagCallcenter = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolCallcenter, 'kolMag' => $KolMagCallcenter );

        $term = "ATM";
		$KolATM    = rand(1, 2);
		$KolMagATM = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolATM, 'kolMag' => $KolMagATM );

        $term = "Wealthy_LuxuryRestaurant";
		$KolRestaurant    = 2;
		$KolMagRestaurant = rand(1, 2);
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolRestaurant, 'kolMag' => $KolMagRestaurant );

        $term = "Bar";
		$KolBar    = 1;
		$KolMagBar = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolBar, 'kolMag' => $KolMagBar );

        $term = "Wealthy_sport";
		$KolSport    = rand(1, 2);
		$KolMagSport = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolSport, 'kolMag' => $KolMagSport );

        $term = "Saving";
		$KolSaving    = rand(1, 2);
		$KolMagSaving = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolSaving, 'kolMag' => $KolMagSaving );

        $term = "SPOTIFY";
		$KolSPOTIFY    = 1;
		$KolMagSPOTIFY = 1;
        $Wmassiv[] = array('term' => $term, 'kolTranz' => $KolSPOTIFY, 'kolMag' => $KolMagSPOTIFY );



        foreach ($Wmassiv as $categ)
        {

            $category = $categ['term'];
            $kolTranz = $categ['kolTranz'];
            $kolMag   = $categ['kolMag'];

            //include 'yelp.php';

            $sql = 'SELECT * FROM yelp where category = :category AND state = :state --';
            $s = $pdo->prepare($sql);
            $s->bindValue(':category', $category);
            $s->bindValue(':state', $state);
            $s->execute();
            $yelp_zapros = $s->fetchAll();
            

            if(!empty($yelp_zapros)) {
                for ($n = 1; $n <= $kolMag; $n++) {

                    $numberMag = array_rand($yelp_zapros);

                    $nameMag  = $yelp_zapros[$numberMag]['name'];
                    $cityMag  = $yelp_zapros[$numberMag]['city'];
                    $stateMag = $yelp_zapros[$numberMag]['state'];
                    
                    //$cityMag  = $yelp_zapros[$numberMag]['location']['city'];
                    //$stateMag = $yelp_zapros[$numberMag]['location']['state'];

                    $catMag[] = array('nameMag' => $nameMag, 'cityMag' => $cityMag, 'stateMag' => $stateMag);
                }
            }
            else {
                
                $sql = 'SELECT * FROM yelp where category = :category --';
                $s = $pdo->prepare($sql);
                $s->bindValue(':category', $category);
                $s->execute();
                $yelp_zapros = $s->fetchAll();

                if(!empty($yelp_zapros)) {
                    for ($n = 1; $n <= $kolMag; $n++) {
    
                        $numberMag = array_rand($yelp_zapros);
    
                        $nameMag  = $yelp_zapros[$numberMag]['name'];
                        $cityMag  = $yelp_zapros[$numberMag]['city'];
                        $stateMag = $yelp_zapros[$numberMag]['state'];
                        
                        //$cityMag  = $yelp_zapros[$numberMag]['location']['city'];
                        //$stateMag = $yelp_zapros[$numberMag]['location']['state'];
    
                        $catMag[] = array('nameMag' => $nameMag, 'cityMag' => $cityMag, 'stateMag' => $stateMag);
                    }
                }
                
                    if        ($category == 'Saving') { $catMag[] = array('nameMag' => 'Saving', 'cityMag' => 'Saving', 'stateMag' => 'Saving');  }
                    else if   ($category == 'SPOTIFY') { $catMag[] = array('nameMag' => 'SPOTIFY', 'cityMag' => 'SPOTIFY', 'stateMag' => 'SPOTIFY');  }
                }

            include 'gen';
        }
    }

}


/*
$name = 'RONALD MERCADO';
$address = '4708 DISSTON ST';
$address2 = 'PHILADELPHIA, PA  19135-1902';
$account = '3830 2220 0398';
*/



if(empty($start_balance) AND empty($end_balance))
{
    if ($profile == 'Poverty')
    {
        //1350.10 - 2120.50
        $strBal = rand(1350, 2120);
        $strSot = rand(10, 50)/100;

        $start_balance = $strBal + $strSot;
    }
    else if ( $profile == 'Poor' )
    {
        //3000.05 - 3550.10

        $strBal = rand(3000, 3550);
        $strSot = rand(5, 10)/100;

        $start_balance = $strBal + $strSot;
    }
    else if ( $profile == 'Middle' )
    {
        //6900.35 - 9500.15

        $strBal = rand(6900, 9500);
        $strSot = rand(15, 35)/100;

        $start_balance = $strBal + $strSot;
    }
    else if ( $profile == 'Wealthy' )
    {
        //17500.10 - 28300.90

        $strBal = rand(17500, 28300);
        $strSot = rand(10, 90)/100;

        $start_balance = $strBal + $strSot;
    }
}





// PAGE 1
$pdf->AddPage();
$Npage = 1;
//$tplIdx = $pdf->importPage(1);
//$pdf->useTemplate($tplIdx);
$pdf->SetDrawColor(56,73,166);
$pdf->SetFillColor(255,255,255);



$pdf->Image('p3-1_new.jpg', 12.7, 18.3, -300);

$pdf->Image('p3-2.jpg', 132.4, 19.4, -300);
$pdf->SetFont('ConnectionsBold','', 9.5);
$pdf->SetXY(139.97, 30.99);
$pdf->Cell(1, 5, 'Customer service information', 0, 1, 'L', false);


$pdf->Image('p1-1_new.jpg', 134.6, 43.3, -300);
$pdf->Image('p1-2_new.jpg', 133.6, 56.2, -300);
$pdf->Image('p1-3_new.jpg', 133.6, 62.6, -300);
$pdf->SetTextColor(70, 70, 70);
$pdf->SetFont('Connections-Regular','', 9.5);
$pdf->SetXY(139.97, 42.8);
$pdf->Cell(1, 5, '1.888.888.RWDS (1.888.888.7937)', 0, 1, 'L', false);
$pdf->SetXY(139.97, 49.4);
$str = 'En Español: 1.800.688.6086';
$str = iconv('UTF-8', 'windows-1252', $str);
$pdf->Cell(1, 5, $str, 0, 1, 'L', false);


$pdf->SetXY(139.98, 55.5);
$pdf->Cell(1, 5, 'bankofamerica.com', 0, 1, 'L', false);
$pdf->SetXY(139.98, 61.57);
$pdf->Cell(1, 5, 'Bank of America, N.A.', 0, 1, 'L', false);
$pdf->SetXY(139.98, 65.2);
$pdf->Cell(1, 5, 'P.O. Box 25118', 0, 1, 'L', false);
$pdf->SetXY(139.98, 68.8);
$pdf->Cell(1, 5, 'Tampa, FL 33622-5118', 0, 1, 'L', false);


$pdf->SetFont('HigherStandards','', 7);
$pdf->SetXY(12.96, 29.47);
$pdf->Cell(1, 5, 'P.O. Box 15284', 0, 1, 'L', false);
$pdf->SetXY(12.96, 32.55);
$pdf->Cell(1, 5, 'Wilmington, DE 19850', 0, 1, 'L', false);


$pdf->SetFont('ConnectionsBold','', 17);
$pdf->SetTextColor(41, 31, 32);
$pdf->SetXY(11.7, 109.25); // 109.3
$pdf->Cell(40, 4, 'Your Adv Relationship Banking', 0, 1, 'L', false);
$pdf->SetXY(11.7, 116.2);
$pdf->Cell(40, 4, 'Preferred Rewards Platinum', 0, 1, 'L', false);


$pdf->SetFont('ConnectionsMedium','', 15);
$pdf->SetTextColor(228, 24, 62);
$pdf->SetXY(11.7, 138.3);
$pdf->Cell(40, 4, 'Account summary', 0, 1, 'L', false);



$pdf->SetFont('Connections-Regular','', 9);
$pdf->SetTextColor(41, 31, 32);
$pdf->SetXY(14.95, 52.48);
$pdf->Cell(1, 10, $name, 100, 100, 'L', false); // +

$pdf->SetTextColor(41, 31, 32);
$pdf->SetXY(14.95, 58.68);
$pdf->Cell(1, 5, $address, 0, 0, 'L', false);  // +

$pdf->SetTextColor(41, 31, 32);
$pdf->SetXY(14.95, 62.55);
$pdf->Cell(1, 5, $address2, 0, 0, 'L', false);  // +

$pdf->SetFont('Connections-Regular','', 11);
$pdf->SetTextColor(41, 31, 32);
$pdf->SetXY(132.35, 123);
$pdf->Cell(1, 4, "Account number: ".$account, 100, 100, 'L', false);

$pdf->SetTextColor(41, 31, 32);
$pdf->SetXY(11.7, 123);
//$pdf->Cell(1, 4, "for November 28, 2023 to December 26, 2023", 100, 100, 'L', false); // +
$pdf->Cell(100, 4, "for ".$start_date, 100, 100, 'L', false); // +


//ITC_Franklin_Gothic_Book-regular
$pdf->SetFont('ConnectionsBold','', 10);
$pdf->SetTextColor(41, 31, 32);
$pdf->SetXY(11.7, 129.6);
$pdf->Cell(40, 4, $name, 100, 100, 'L', true);


$pdf->SetDrawColor(123,121,122);
$pdf->SetLineWidth(0.1);
$pdf->Line(12.9, 273.05, 203.15, 273.05);




// PAGE 2
$pdf->AddPage();
$Npage++;
//$tplIdx = $pdf->importPage(2);
//$pdf->useTemplate($tplIdx);
$pdf->SetFillColor(255,255,255);
$pdf->SetDrawColor(123,121,122);
$pdf->SetLineWidth(0.1);
$pdf->Line(12.7, 13, 195.7, 13);

$pdf->SetFont('ConnectionsMedium','', 8);
$pdf->SetTextColor(41, 31, 32);
$pdf->SetXY(11.7, 8.67);
$pdf->Cell(1, 4, $name ."   |   Account  # ". $account . "   |   ".$start_date, 0, 1, 'L', true);
//$pdf->Cell(1, 4, $name ."   |   Account # ". $account . "   |   November 28, 2023 to December 26, 2023", 0, 1, 'L', false);


$pdf->SetFont('ConnectionsBold','', 16);
$pdf->SetTextColor(228, 24, 62);
$pdf->SetXY(11.7, 17);
$pdf->Cell(1, 4, "IMPORTANT INFORMATION:", 0, 1, 'L', false);


$pdf->SetFont('Connections-Regular','', 15);
$pdf->SetTextColor(228, 24, 62);
$pdf->SetXY(11.7, 23.7);
$pdf->Cell(1, 4, "BANK DEPOSIT ACCOUNTS", 0, 1, 'L', false);

$pdf->SetFont('Connections-Regular','', 10);
$pdf->SetTextColor(228, 24, 62);
$pdf->SetXY(11.7, 33.1);
$pdf->Cell(1, 4, "How to Contact Us", 0, 1, 'L', false);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(11.22, 33.17);
$pdf->Cell(1, 4, "                               - You may call us at the telephone number listed on the front of this statement.", 0, 1, 'L', false);    


/*
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(11.7, 41.65);
$pdf->MultiCell(200, 4.2, '                                                       - We encourage you to keep your contact information up-to-date. This includes address,
email and phone number. If your information has changed, the easiest way to update it is by visiting the Help & Support tab of
Online Banking.
', 0, 1, 'L', false);
$pdf->SetTextColor(228, 24, 62);
$pdf->SetXY(11.7, 41.6);
$pdf->MultiCell(54, 4.2, 'Updating your contact information', 0, 1, 'L', true);
*/


$pdf->SetFont('Connections-Regular','', 10);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(11.7, 41.6);
$pdf->MultiCell(200, 4.2, ',
email and phone number. If your information has changed, the easiest way to update it is by visiting the Help & Support tab of
Online Banking.
', 0, 1, 'L', false);

$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(51.7, 41.6);
$pdf->Cell(153.7, 4.2, '             - We encourage you to keep your contact information up-to-date. This includes address', 0, 1, 'L', false);

$pdf->SetTextColor(228, 24, 62);
$pdf->SetXY(11.7, 41.6);
$pdf->MultiCell(53.7, 4.2, 'Updating your contact information', 0, 1, 'L', false);





$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(11.7, 58.78);
$pdf->MultiCell(200, 4.3, '

part of the contract for your deposit account and govern all transactions relating to your account, including all deposits and
withdrawals. Copies of both the deposit agreement and fee schedule which contain the current version of the terms and
conditions of your account relationship may be obtained at our financial centers.', 0, 1, 'L', false);

$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(11.7, 63.05);
$pdf->Cell(32.8, 4.3, 'account would be governed by the terms of these documents, as we may amend them from time to time. These documents are', 0, 1, 'L', false);


$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(41.1, 58.78);
$pdf->Cell(32.8, 4.3, '- When you opened your account, you received a deposit agreement and fee schedule and agreed that your', 0, 1, 'L', false);

$pdf->SetTextColor(228, 24, 62);
$pdf->SetXY(11.7, 58.78);
$pdf->Cell(30.6, 4.3, 'Deposit agreement', 0, 1, 'L', false);



/* */
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(11.7, 84.56);
$pdf->MultiCell(200, 4.25, ' 
wrong or you need more information about an electronic transfer (e.g., ATM transactions, direct deposits or withdrawals,
point-of-sale transactions) on the statement or receipt, telephone or write us at the address and number listed on the front of
this statement as soon as you can. We must hear from you no later than 60 days after we sent you the FIRST statement on
which the error or problem appeared.
', 0, 1, 'L', false);

$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(133.92, 84.56);
$pdf->Cell(124, 4.3, '- If you think your statement or receipt is', 0, 1, 'L', false);

$pdf->SetTextColor(228, 24, 62);
$pdf->SetXY(11.7, 84.56);
$pdf->Cell(124, 4.3, 'Electronic transfers: In case of errors or questions about your electronic transfers', 0, 1, 'L', false);






$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(24.4, 110.4);
$pdf->MultiCell(200, 4.2, 'Tell us your name and account number. 
Describe the error or transfer you are unsure about, and explain as clearly as you can why you believe there is an error
or why you need more information.', 0, 1, 'L', false);


$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(24.4, 123.15);
$pdf->Cell(124, 4.3, 'Tell us the dollar amount of the suspected error.', 0, 1, 'L', false);


$pdf->SetXY(18.2, 110.4);
$pdf->SetFont('symbol','', 8);
$pdf->MultiCell(4, 4.2, '-
-', 0, 1, 'L', false);

$pdf->SetXY(18.2, 123.3);
$pdf->SetFont('symbol','', 8);
$pdf->Cell(4, 4.2, '-', 0, 1, 'L', false);




$pdf->SetFont('Connections-Regular','', 10);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(11.7, 131.8);
$pdf->MultiCell(200, 4.3, 'For consumer accounts used primarily for personal, family or household purposes, we will investigate your complaint and will
correct any error promptly. If we take more than 10 business days (10 calendar days if you are a Massachusetts customer) (20
business days if you are a new customer, for electronic transfers occurring during the first 30 days after the first deposit is
made to your account) to do this, we will provisionally credit your account for the amount you think is in error, so that you will
have use of the money during the time it will take to complete our investigation.', 0, 1, 'L', false);


$pdf->SetXY(11.7, 157.8);
$pdf->MultiCell(200, 4.2, 'For other accounts, we investigate, and if we find we have made an error, we credit your account at the conclusion of our
investigation.', 0, 1, 'L', false);






$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(11.7, 170.62);
$pdf->MultiCell(200, 4.25, '                                         
errors and unauthorized transactions on your account. If you fail to notify us in writing of suspected problems or an
unauthorized transaction within the time period specified in the deposit agreement (which periods are no more than 60 days
after we make the statement available to you and in some cases are 30 days or less), we are not liable to you and you agree to
not make a claim against us, for the problems or unauthorized transactions.', 0, 1, 'L', false);


$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(50.7, 170.62);
$pdf->Cell(40.3, 4.2, '- You must examine your statement carefully and promptly. You are in the best position to discover', 0, 1, 'L', false);

$pdf->SetTextColor(228, 24, 62);
$pdf->SetXY(11.7, 170.62);
$pdf->MultiCell(40.2, 4.2, 'Reporting other problems', 0, 1, 'L', false);



$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(11.7, 196.3);
$pdf->MultiCell(200, 4.3, '
person or company, you may call us to find out if the deposit was made as scheduled. You may also review your activity online
or visit a financial center for information.', 0, 1, 'L', false);


$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(35.2, 196.4);
$pdf->Cell(40.3, 4.3, '- If you have arranged to have direct deposits made to your account at least once every 60 days from the same', 0, 1, 'L', false);

$pdf->SetTextColor(228, 24, 62);
$pdf->SetXY(11.7, 196.4);
$pdf->Cell(24.6, 4.3, 'Direct deposits', 0, 1, 'L', false);



$pdf->SetFont('Connections-Regular','', 10);
$pdf->SetTextColor(41, 31, 32);
$pdf->SetXY(16.7, 217.9);
$pdf->Cell(1, 4, $year." Bank of America Corporation", 0, 1, 'L', true);


$pdf->SetFont('Connections-Regular','', 10);
$pdf->SetTextColor(41, 31, 32);
$pdf->SetXY(10.6, 217.9);
$pdf->Cell(1, 4, "©", 0, 1, 'L', true);
$pdf->SetXY(10.6, 217.5);
$pdf->Cell(3, 6, " ", 0, 1, 'L', true);

$pdf->Image('p2-1.png', 50.8, 231.2, -300);





// PAGE 3
$pdf->AddPage();
$Npage++;
//$tplIdx = $pdf->importPage(3);
//$pdf->useTemplate($tplIdx);
$pdf->SetDrawColor(56,73,166);
$pdf->SetFillColor(255,255,255);

$pdf->SetFont('ConnectionsMedium','', 8);
$pdf->SetTextColor(41, 31, 32);
$pdf->SetXY(11.7, 26.5);
$pdf->Cell(200, 4, $name ."   |   Account # ". $account . "   |   ".$start_date, 100, 100, 'L', true);




// Line
$pdf->SetDrawColor(123,121,122);
$pdf->SetLineWidth(0.1);
$pdf->Line(12.8, 30.8, 203.2, 30.8);
$pdf->Image('p3-1_new.jpg', 12.8, 16.5, -300);
// Banner
$pdf->Image('p3-2_1.jpg', 19.2, 219, -300);






// ДЕПОЗИТЫ
$sql = "SELECT * FROM massiv where id = :id AND tip = :tip --";
$statement = $pdo->prepare($sql);
$statement->bindValue(':id', $id);
$statement->bindValue(':tip', 'deposit');
$statement->execute();
$depositors = $statement->fetchAll();
foreach ($depositors as $dep)
{

$yelp_categ = $dep['yelp_cat'];

$Ddsumma = $Ddsumma + $dep['summa'];

// Online
if ($yelp_categ == 'dsite')
{
$dmd_take = date('m/d', strtotime($dep['date']));
$droll1 = rand(1, 9);$droll2 = rand(1, 9);$droll3 = rand(1, 9);$droll4 = rand(1, 9);
$drand = $droll1.$droll2.$droll3.$droll4;

$dname  = $dep['name'];
$dgorod = $dep['gorod'];
$dstate = $dep['state'];

$tranzaction = $dname." ".$dmd_take." #00000".$drand." PMNT RCVD ".$dname." ".$gorod." ".$state;
}

// P2P
else if ($yelp_categ == 'dp2p')
{
$dname = $dep['name'];

$arr1 = array('b', 'c', 'd','f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z');
$res1 = '';
for ($i = 0; $i < 1; $i++) {$res1 .= $arr1[random_int(0, count($arr1) - 1)];}

$tranz2 = rand(0, 9);
$tranz3 = rand(0, 9);

$arr4 = array('b', 'c', 'd','f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z');
$res4 = '';
for ($i = 0; $i < 1; $i++) {$res4 .= $arr4[random_int(0, count($arr4) - 1)];}

$arr5 = array('b', 'c', 'd','f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z');
$res5 = '';
for ($i = 0; $i < 1; $i++) {$res5 .= $arr5[random_int(0, count($arr5) - 1)];}

$arr6 = array('b', 'c', 'd','f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z');
$res6 = '';
for ($i = 0; $i < 1; $i++) {$res6 .= $arr6[random_int(0, count($arr6) - 1)];}

$arr7 = array('b', 'c', 'd','f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z');
$res7 = '';
for ($i = 0; $i < 1; $i++) {$res7 .= $arr7[random_int(0, count($arr7) - 1)];}

$tranz8 = rand(0, 9);
$tranz9 = rand(0, 9);

$drand = $res1.$tranz2.$tranz3.$res4.$res5.$res6.$res7.$tranz8.$tranz9;

$tranzaction = 'Online Banking Transfer conf# '.$drand.'; '.$dname;
}

// COMPANY
else if ($yelp_categ == 'dfirma')
{
$dname = $dep['name'];

$arr1 = array('b', 'c', 'd','f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z');
$res1 = '';
for ($i = 0; $i < 1; $i++) {$res1 .= $arr1[random_int(0, count($arr1) - 1)];}

$tranz2 = rand(0, 9);
$tranz3 = rand(0, 9);

$arr4 = array('b', 'c', 'd','f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z');
$res4 = '';
for ($i = 0; $i < 1; $i++) {$res4 .= $arr4[random_int(0, count($arr4) - 1)];}

$arr5 = array('b', 'c', 'd','f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z');
$res5 = '';
for ($i = 0; $i < 1; $i++) {$res5 .= $arr5[random_int(0, count($arr5) - 1)];}

$arr6 = array('b', 'c', 'd','f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z');
$res6 = '';
for ($i = 0; $i < 1; $i++) {$res6 .= $arr6[random_int(0, count($arr6) - 1)];}

$arr7 = array('b', 'c', 'd','f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z');
$res7 = '';
for ($i = 0; $i < 1; $i++) {$res7 .= $arr7[random_int(0, count($arr7) - 1)];}

$tranz8 = rand(0, 9);
$tranz9 = rand(0, 9);

$drand = $res1.$tranz2.$tranz3.$res4.$res5.$res6.$res7.$tranz8.$tranz9;

$tranzaction = 'Online Banking Transfer conf# '.$drand.'; '.$dname;
}

// REFAUND
else if ($yelp_categ == 'drefaund')
{
$dname = $dep['name'];

$drand1 = rand(1,9); $drand2 = rand(1,9); $drand3 = rand(1,9); $drand4 = rand(1,9); $drand5 = rand(1,9); $drand6 = rand(1,9); $drand7 = rand(1,9);
$drandroll = $drand1.$drand2.$drand3.$drand4.$drand5.$drand6.$drand7;

$dlina = mb_strlen($dname);
if ($dlina < 17) {  $dname = str_pad($dname,  16, ' ', STR_PAD_RIGHT); } else { }

$tranzaction = $dname."  DES:PAYMENT REFUND ID:".$drandroll." INDN:".$name."          CO ID:".$id_banka;
}


// merch
else if ($yelp_categ == 'merch')
{
$dname = $dep['name'];

if ($dep['vid'] == 'Zelle')
{
    $arr1 = array('b', 'c', 'd','f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z');
    $res1 = '';
    for ($i = 0; $i < 1; $i++) {$res1 .= $arr1[random_int(0, count($arr1) - 1)];}
    
    $tranz2 = rand(0, 9);
    $tranz3 = rand(0, 9);
    
    $arr4 = array('b', 'c', 'd','f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z');
    $res4 = '';
    for ($i = 0; $i < 1; $i++) {$res4 .= $arr4[random_int(0, count($arr4) - 1)];}
    
    $arr5 = array('b', 'c', 'd','f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z');
    $res5 = '';
    for ($i = 0; $i < 1; $i++) {$res5 .= $arr5[random_int(0, count($arr5) - 1)];}
    
    $arr6 = array('b', 'c', 'd','f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z');
    $res6 = '';
    for ($i = 0; $i < 1; $i++) {$res6 .= $arr6[random_int(0, count($arr6) - 1)];}
    
    $arr7 = array('b', 'c', 'd','f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z');
    $res7 = '';
    for ($i = 0; $i < 1; $i++) {$res7 .= $arr7[random_int(0, count($arr7) - 1)];}
    
    $tranz8 = rand(0, 9);
    $tranz9 = rand(0, 9);
    
    $DtranzaZ = $res1.$tranz2.$tranz3.$res4.$res5.$res6.$res7.$tranz8.$tranz9;

    $tranzaction = "Zelle payment from ".$dname."  Conf# ".$DtranzaZ;
}


else if ($dep['vid'] == 'Venmo')
{
    $arr1 = array('b', 'c', 'd','f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z');
    $res1 = '';
    for ($i = 0; $i < 1; $i++) {$res1 .= $arr1[random_int(0, count($arr1) - 1)];}
    
    $tranz2 = rand(0, 9);
    $tranz3 = rand(0, 9);
    
    $arr4 = array('b', 'c', 'd','f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z');
    $res4 = '';
    for ($i = 0; $i < 1; $i++) {$res4 .= $arr4[random_int(0, count($arr4) - 1)];}
    
    $arr5 = array('b', 'c', 'd','f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z');
    $res5 = '';
    for ($i = 0; $i < 1; $i++) {$res5 .= $arr5[random_int(0, count($arr5) - 1)];}
    
    $arr6 = array('b', 'c', 'd','f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z');
    $res6 = '';
    for ($i = 0; $i < 1; $i++) {$res6 .= $arr6[random_int(0, count($arr6) - 1)];}
    
    $arr7 = array('b', 'c', 'd','f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z');
    $res7 = '';
    for ($i = 0; $i < 1; $i++) {$res7 .= $arr7[random_int(0, count($arr7) - 1)];}
    
    $tranz8 = rand(0, 9);
    $tranz9 = rand(0, 9);
    
    $DtranzaZ = $res1.$tranz2.$tranz3.$res4.$res5.$res6.$res7.$tranz8.$tranz9;

    $tranzaction = "Venmo payment from ".$dname."  Conf# ".$DtranzaZ;
}

else if ($dep['vid'] == 'Cashapp')
{
    $payroll1 = rand(1, 6);
    $payroll2 = rand(0, 9);
    $payroll3 = rand(0, 9);
    $payroll4 = rand(0, 9);
    $payroll5 = rand(0, 9);
    
    $Dcashapp = $payroll1.$payroll2.$payroll3.$payroll4.$payroll5;

    $dmd_take = date('m/d', strtotime($dep['date']));

    $tranzaction = $dmd_take." #0003".$Dcashapp." PMNT RCVD Cash App*Cash Out San Francisco CA";
}


}


$infomes[] = array('date' => $dep['date'], 'tranz' => $tranzaction, 'sum' => $dep['sum'], 'categ' => '' );


}

// dsite
// CONIBASE 01/03 #000007248 PMNT RCVD COINBASE  SAN FRANCISCO CA
// 1. NAME   2. GOROD 3. state

// dp2p
// Online Banking Transfer conf# e5rxvh0mj; LANKALA, ANOOP    FAMIlIya, imya
// 1. Familiya 2. Imya

// dfirma
// Online Banking Transfer conf# e5rxvh0mj; IMYA FIRMI
// name firm

// drefaund
// DESERVE INC DES:PAYMENT REFUND ID:1433029INDN:Ronalc Mercado CO ID 2454455352(bank id)
// 1.Name firma 2. FIO


$pdf->SetFont('ConnectionsMedium','', 15);
$pdf->SetTextColor(228, 24, 62);
$text = 'Deposits and other additions';
$pdf->SetXY(11.7, 42.7);
$pdf->Cell(11, 5, $text, 0, 1, 'L', true);


// Стили
$pdf->SetFont('Connections-Regular','', 8);
$pdf->SetTextColor(41, 31, 32);
$pdf->SetDrawColor(123,121,122);



$pdf->SetXY(11.7, 47.95);
$pdf->MultiCell(18, 4, 'Date', 0, 'L', false); // Даты
$pdf->SetXY(31.05, 47.95);
$pdf->MultiCell(130, 4, 'Description', 0, 'L', false); // Транза
$pdf->SetXY(179.3, 47.95);
$pdf->MultiCell(25, 4, 'Amount', 0, 'R', false); // Сумма

$pdf->SetLineWidth(0.1);
$pdf->Line(12.8, 52.4, 203.2, 52.4);


// Стили
$pdf->SetFont('Connections-Regular','', 9);
$pdf->SetTextColor(41, 31, 32);
$pdf->SetDrawColor(123,121,122);

/*
unset($infomes);

$infomes[] = array('date' => '11/29/23', 'tranz' => 'Zelle payment from  SOCRATES MERCADO Conf# 0I05N0X2A', 'sum' => '150.00');
$infomes[] = array('date' => '12/26/23', 'tranz' => 'Bank of America  DES:CASHREWARD ID:MERCADO  INDN:0000000620408088000000  CO ID:2002290310 PPD', 'sum' => '208.56');
$infomes[] = array('date' => '12/26/23', 'tranz' => 'Interest Earned', 'sum' => '1.02');
*/

if (!empty($infomes))
{

sort($infomes);


$sum = 0;
$Xdate = '11.8';
$Xtranz = '31.2';
$Xsum = '179';
$Y = '53.8';
$Yline = '52.3';

foreach ($infomes as $value => $inf)
{

    $pdf->SetXY($Xdate, $Y);
    $pdf->MultiCell(18, 4, $inf['date'], 0, 'L', true); // Даты
    $pdf->SetXY($Xtranz, $Y);
    $pdf->MultiCell(135, 4, $inf['tranz'], 0, 'L', true); // Транза
    $pdf->SetXY($Xsum, $Y);
    $pdf->MultiCell(25, 4, number_format($inf['sum'], 2, '.', ','), 0, 'R', true); // Сумма


    if ( mb_strlen($inf['tranz'], 'UTF-8') >= 92 )
    {
        $Yline = $Yline + 10.2;
        $Y = $Y + 10.2;
    }
    else
    {  
        $Yline = $Yline + 6.6;
        $Y = $Y + 6.6;
    }
        $pdf->SetLineWidth(0.1);
        $pdf->Line(12.7, $Yline, 203, $Yline);

        $sum = $sum + $inf['sum'];
}




}
else 
{

}




$deposit_total = 'Total deposits and other additions';

$deposit_total_sum = '$'.number_format($sum, 2, '.', ',');
$pdf->SetFont('ConnectionsBold','', 10);
$pdf->SetTextColor(1, 97, 171);

$Ytext_depos = $Y;
$pdf->SetXY(11.7, $Ytext_depos);
$pdf->MultiCell(150, 4, $deposit_total, 0, 'L', true); // текст депозита
$pdf->SetXY(179, $Ytext_depos);
$pdf->MultiCell(25, 4, $deposit_total_sum, 0, 'R', true); // Сумма депозита





// Withdrawals
$Ytext_with = $Ytext_depos + 14;

$pdf->SetFont('ConnectionsMedium','', 15);
$pdf->SetTextColor(228, 24, 62);
$text = 'Withdrawals and other subtractions';
$pdf->SetXY(11.7, $Ytext_with);
$pdf->Cell(1, 5, $text, 0, 1, 'L', true);


$Ytext_with2 = $Ytext_with + 11.6;
$pdf->SetFont('Connections-Regular','', 11);
$pdf->SetTextColor(228, 24, 62);
$text = 'Other subtractions';
$pdf->SetXY(11.7, $Ytext_with2);
$pdf->Cell(1, 5, $text, 0, 1, 'L', true);


// Стили
$pdf->SetFont('Connections-Regular','', 8);
$pdf->SetTextColor(41, 31, 32);
$pdf->SetDrawColor(123,121,122);

$header_table = $Ytext_with2 + 6.4;
$pdf->SetXY(11.7, $header_table);
$pdf->MultiCell(18, 4, 'Date', 0, 'L', false); // Даты
$pdf->SetXY(31.05, $header_table);
$pdf->MultiCell(130, 4, 'Description', 0, 'L', false); // Транза
$pdf->SetXY(179.3, $header_table);
$pdf->MultiCell(25, 4, 'Amount', 0, 'R', false); // Сумма



$line_table = $header_table + 4.5;
$pdf->SetLineWidth(0.1);
$pdf->Line(12.7, $line_table, 203, $line_table);







// Списание
$sql = "SELECT * FROM massiv where id = :id AND tip = :tip --";
$statement = $pdo->prepare($sql);
$statement->bindValue(':id', $id);
$statement->bindValue(':tip', 'withdrawls');
$statement->execute();
$withdrawls = $statement->fetchAll();
foreach ($withdrawls as $win)
{

$yelp_categ = $win['yelp_cat'];

$Wdsumma = $Wdsumma + $win['summa'];

// Online
    if ($yelp_categ == 'wsite')
    {
    $wmd_take = date('m/d', strtotime($win['date']));
    $wroll1 = rand(1, 9);$wroll2 = rand(1, 9);$wroll3 = rand(1, 9);$wroll4 = rand(1, 9);
    $wrand = $wroll1.$wroll2.$wroll3.$wroll4;

    $wname  = $win['name'];
    $wgorod = $win['gorod'];
    $wstate = $win['state'];

    $tranzaction = "PURCHASE ".$wmd_take." ".$wname." ".$wgorod." ".$wstate;

    }

    // P2P
    else if ($yelp_categ == 'wp2p')
    {
    $wname = $win['name'];


    $t1 = rand(1,9);
    $t2 = rand(0,9);
    $t3 = rand(0,9);
    $t4 = rand(0,9);

    $wrand = $t1.$t2.$t3.$t4;

    $tranz1 = rand(1, 9);
    $tranz2 = rand(0, 9);
    $tranz3 = rand(0, 9);
    $tranz4 = rand(0, 9);
    $tranz5 = rand(0, 9);
    $tranz6 = rand(0, 9);
    $tranz7 = rand(0, 9);
    $tranz8 = rand(0, 9);
    $tranz9 = rand(0, 9);
    $tranz10 = rand(0, 9);

    $wrand2 = $tranz1.$tranz2.$tranz3.$tranz4.$tranz5.$tranz6.$tranz7.$tranz8.$tranz9.$tranz10;

    $tranzaction = 'Online Banking payment to CRD '.$wrand.' conf# '.$wrand2;
    }

    // COMPANY
    else if ($yelp_categ == 'wfirma')
    {
    $wname = $win['name'];

    $tranz1 = rand(1, 9);
    $tranz2 = rand(0, 9);
    $tranz3 = rand(0, 9);
    $tranz4 = rand(0, 9);

    $arr1 = array('b', 'c', 'd','f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z');
    $res1 = '';
    for ($i = 0; $i < 1; $i++) {$res1 .= $arr1[random_int(0, count($arr1) - 1)];}
    $res1 = strtoupper($res1);
    $tranz = $res1.$tranz1.$tranz2.$tranz3.$tranz4;

    $dlina = mb_strlen($wname);
    if ($dlina < 17) {  $wname = str_pad($wname,  16, ' ', STR_PAD_RIGHT); } else { }

    $tranzaction = $wname.' DES:PMT        ID:'.$tranz.' INDN:'.$name.'          CO';
    }

    // wpayshop
    else if ($yelp_categ == 'wpayshop')
    {
    $wname = $win['name'];
    $wgorod = $win['gorod'];
    $wstate = $win['state'];

    $wmd_take = date('m/d', strtotime($win['date']));

    $wrand1 = rand(1,9); $wrand2 = rand(1,9); $wrand3 = rand(1,9); $wrand4 = rand(1,9); $wrand5 = rand(1,9);
    $wrandroll = $wrand1.$wrand2.$wrand3.$wrand4.$wrand5;

    $dlina = mb_strlen($dname);
    if ($dlina < 17) {  $dname = str_pad($dname,  16, ' ', STR_PAD_RIGHT); } else { }

    $tranzaction = $wname." ".$wmd_take." #0001".$wrandroll." PURCHASE ".$wname." ".$wgorod." ".$wstate;


    }


    // merch
    else if ($yelp_categ == 'wmerch')
    {
    $wname = $win['name'];

    if ($win['vid'] == 'Zelle')
    {
        $arr1 = array('b', 'c', 'd','f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z');
        $res1 = '';
        for ($i = 0; $i < 1; $i++) {$res1 .= $arr1[random_int(0, count($arr1) - 1)];}
        
        $tranz2 = rand(0, 9);
        $tranz3 = rand(0, 9);
        
        $arr4 = array('b', 'c', 'd','f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z');
        $res4 = '';
        for ($i = 0; $i < 1; $i++) {$res4 .= $arr4[random_int(0, count($arr4) - 1)];}
        
        $arr5 = array('b', 'c', 'd','f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z');
        $res5 = '';
        for ($i = 0; $i < 1; $i++) {$res5 .= $arr5[random_int(0, count($arr5) - 1)];}
        
        $arr6 = array('b', 'c', 'd','f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z');
        $res6 = '';
        for ($i = 0; $i < 1; $i++) {$res6 .= $arr6[random_int(0, count($arr6) - 1)];}
        
        $arr7 = array('b', 'c', 'd','f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z');
        $res7 = '';
        for ($i = 0; $i < 1; $i++) {$res7 .= $arr7[random_int(0, count($arr7) - 1)];}
        
        $tranz8 = rand(0, 9);
        $tranz9 = rand(0, 9);
        
        $WtranzaZ = $res1.$tranz2.$tranz3.$res4.$res5.$res6.$res7.$tranz8.$tranz9;

        $tranzaction = "Zelle payment to ".$wname."  Conf# ".$WtranzaZ;
    }


    else if ($win['vid'] == 'Venmo')
    {
        $arr1 = array('b', 'c', 'd','f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z');
        $res1 = '';
        for ($i = 0; $i < 1; $i++) {$res1 .= $arr1[random_int(0, count($arr1) - 1)];}
        
        $tranz2 = rand(0, 9);
        $tranz3 = rand(0, 9);
        
        $arr4 = array('b', 'c', 'd','f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z');
        $res4 = '';
        for ($i = 0; $i < 1; $i++) {$res4 .= $arr4[random_int(0, count($arr4) - 1)];}
        
        $arr5 = array('b', 'c', 'd','f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z');
        $res5 = '';
        for ($i = 0; $i < 1; $i++) {$res5 .= $arr5[random_int(0, count($arr5) - 1)];}
        
        $arr6 = array('b', 'c', 'd','f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z');
        $res6 = '';
        for ($i = 0; $i < 1; $i++) {$res6 .= $arr6[random_int(0, count($arr6) - 1)];}
        
        $arr7 = array('b', 'c', 'd','f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z');
        $res7 = '';
        for ($i = 0; $i < 1; $i++) {$res7 .= $arr7[random_int(0, count($arr7) - 1)];}
        
        $tranz8 = rand(0, 9);
        $tranz9 = rand(0, 9);
        
        $WtranzaZ = $res1.$tranz2.$tranz3.$res4.$res5.$res6.$res7.$tranz8.$tranz9;

        $tranzaction = "Venmo payment to ".$wname."  Conf# ".$WtranzaZ;
    }

    else if ($win['vid'] == 'Cashapp')
    {

        $payroll1 = rand(1, 9);
        $payroll2 = rand(0, 9);
        $payroll3 = rand(0, 9);
        $payroll4 = rand(0, 9);
        $payroll5 = rand(0, 9);
        $payroll6 = rand(0, 9);
        $payroll7 = rand(0, 9);
        $payroll8 = rand(0, 9);
        $payroll9 = rand(0, 9);
        $payroll10 = rand(0, 9);
        $payroll11 = rand(0, 9);
        $payroll12 = rand(0, 9);

        $cashappNum = $payroll1.$payroll2.$payroll3.$payroll4.$payroll5.$payroll6.$payroll7.$payroll8.$payroll9.$payroll10.$payroll11.$payroll12;

        $wmd_take = date('md', strtotime($win['date']));

        $sql = 'SELECT * FROM names order by RAND() LIMIT 1 --';
        $s = $pdo->prepare($sql);
        $s->execute();
        $names = $s->fetchAll();
        foreach ($names as $n) { $namePerson = $n['name']; $namePerson = strtoupper($namePerson);}

        $wname  = $win['name'];
        $wgorod = $win['gorod'];
        $wstate = $win['state'];

        $tranzaction = "PMNT SENT ".$wmd_take." CASH APP*".$namePerson." B ".$id_banka." ".$wstate." 55429501036".$cashappNum;
        // PMNT SENT 0205 CASH APP*KEANAN B 4153753176 CA 55429501036855396003732

    }


    }

    $sumforwwin = -1 * abs($win['sum']) ;

    $Withdrawals[] = array('date' => $win['date'], 'tranz' => $tranzaction, 'sum' => $sumforwwin, 'categ' => '' );


}




// Стили
$pdf->SetFont('Connections-Regular','', 9);
$pdf->SetTextColor(41, 31, 32);
$pdf->SetDrawColor(123,121,122);


$Wsum = 0;

$Xdate = '11.8';
$Xtranz = '31.2';
$Xsum = '179';

$Ywith = $header_table + 6;
$Ylinewith = $line_table;




/*
unset($Withdrawals);

$Withdrawals[] = array('date' => '11/28/23', 'tranz' => 'CAPITAL ONE      DES:CRCARDPMT  ID:3SS2IEFQS6Y2CNY  INDN:RONALD MERCADO          CO ID:9541719318 WEB', 'sum' => '-304.19');
$Withdrawals[] = array('date' => '11/30/23', 'tranz' => 'Zelle payment to  Elfrin Conf# kvuvi1ows ', 'sum' => '-70.00');
$Withdrawals[] = array('date' => '11/30/23', 'tranz' => 'APPLECARD GSBANK DES:PAYMENT    ID:18309700  INDN:Ronald Mercado          CO ID:9999999999 WEB', 'sum' => '-532.92');
$Withdrawals[] = array('date' => '12/04/23', 'tranz' => 'APPLECARD GSBANK DES:PAYMENT    ID:18309700  INDN:Ronald Mercado          CO ID:9999999999 WEB', 'sum' => '-177.00');
$Withdrawals[] = array('date' => '12/04/23', 'tranz' => 'PAYPAL           DES:INST XFER  ID:NETFLIX.COM  INDN:RONALD MERCADO          CO ID:PAYPALSI77 WEB', 'sum' => '-24.83');
$Withdrawals[] = array('date' => '12/06/23', 'tranz' => 'AMERICAN EXPRESS DES:ACH PMT    ID:W4324  INDN:RONALD MERCADO          CO ID:1133133497 WEB', 'sum' => '-1005.15');
$Withdrawals[] = array('date' => '12/06/23', 'tranz' => 'AMERICAN EXPRESS DES:ACH PMT    ID:W5376  INDN:RONALD MERCADO          CO ID:1133133497 WEB', 'sum' => '-1000.00');
$Withdrawals[] = array('date' => '12/06/23', 'tranz' => 'AMERICAN EXPRESS DES:ACH PMT    ID:W6524  INDN:RONALD MERCADO          CO ID:1133133497 WEB', 'sum' => '-1000.00');
$Withdrawals[] = array('date' => '12/06/23', 'tranz' => 'DISCOVER         DES:E-PAYMENT  ID:4486  INDN:MERCADO RONALD          CO ID:2510020270 WEB', 'sum' => '-41.32');

$Withdrawals[] = array('date' => '12/12/23', 'tranz' => 'CHASE CREDIT CRD DES:EPAY       ID:7163556807  INDN:RONALD S MERCADO        CO ID:5760039224 WEB', 'sum' => '-786.75');
$Withdrawals[] = array('date' => '12/15/23', 'tranz' => 'Zelle payment to  Dad Conf# qiinpvi6r', 'sum' => '-500.00');
$Withdrawals[] = array('date' => '12/15/23', 'tranz' => 'DESERVE INC      DES:PAYMENT    ID:1433029  INDN:Ronald Mercado          CO ID:2454455352 WEB', 'sum' => '-376.07');
$Withdrawals[] = array('date' => '12/18/23', 'tranz' => 'AMERICAN EXPRESS DES:ACH PMT    ID:M2312  INDN:RONALD MERCADO          CO ID:1133133497 WEB', 'sum' => '-500.00');
$Withdrawals[] = array('date' => '12/18/23', 'tranz' => 'AMERICAN EXPRESS DES:ACH PMT    ID:M2944  INDN:RONALD MERCADO          CO ID:1133133497 WEB', 'sum' => '-500.00');
$Withdrawals[] = array('date' => '12/18/23', 'tranz' => 'AMERICAN EXPRESS DES:ACH PMT    ID:M5514  INDN:RONALD MERCADO          CO ID:1133133497 WEB', 'sum' => '-500.00');
$Withdrawals[] = array('date' => '12/22/23', 'tranz' => 'CHASE CREDIT CRD DES:EPAY       ID:7187002446  INDN:RONALD S MERCADO        CO ID:5760039224 WEB', 'sum' => '-350.00');
$Withdrawals[] = array('date' => '12/26/23', 'tranz' => 'WELLS FARGO AUTO DES:FEE & PMTS ID:7790511486  INDN:LAURA,E,MERCADO         CO ID:9330291646 WEB', 'sum' => '-721.64');
$Withdrawals[] = array('date' => '12/26/23', 'tranz' => 'Bank of America Credit Card Bill Payment ', 'sum' => '-250.00');
*/ 




if (!empty($Withdrawals))
{


    /*
    function shuffle_assoc($list) {
        if (!is_array($list)) return $list;
        $keys = array_keys($list);
        shuffle($keys);
        $random = array();
        foreach ($keys as $key) {
          $random[$key] = $list[$key];
        }
        return $random;
      }

    
    $randomR = shuffle_assoc($Withdrawals);
    */
    sort($Withdrawals);


foreach ($Withdrawals as $value2 => $inf2)
{

    $pdf->SetXY($Xdate, $Ywith);
    $pdf->MultiCell(18, 4, $inf2['date'], 0, 'L', true); // Даты
    $pdf->SetXY($Xtranz, $Ywith);
    $pdf->MultiCell(135, 4, $inf2['tranz'], 0, 'L', true); // Транза
    $pdf->SetXY($Xsum, $Ywith);
    $pdf->MultiCell(25, 4, number_format($inf2['sum'], 2, '.', ','), 0, 'R', true); // Сумма


    if ( mb_strlen($inf2['tranz'], 'UTF-8') >= 78 AND mb_strlen($inf2['tranz'], 'UTF-8') <= 154)
    {
        $Ylinewith = $Ylinewith + 10.2;
        $Ywith = $Ywith + 10.2;
    }
    else if ( mb_strlen($inf2['tranz'], 'UTF-8') <= 77)
    {  
        $Ylinewith = $Ylinewith + 6.4;
        $Ywith = $Ywith + 6.4;
    }
    else if ( mb_strlen($inf2['tranz'], 'UTF-8') >= 155)
    {  
        $Ylinewith = $Ylinewith + 14;
        $Ywith = $Ywith + 14;
    }


        $pdf->SetLineWidth(0.1);
        $pdf->Line(12.7, $Ylinewith, 203, $Ylinewith);

        $esli = mb_substr_count($inf2['tranz'], 'Online Banking');
        if ( $esli == 1 ) { $otherSum = $otherSum + $inf2['sum'];}
        else { $Wsum = $Wsum + $inf2['sum']; }
        


// ADD PAGE NEXT
        if ($Ylinewith >= 200)
        {
            $next_page = $Ylinewith + 0.6;
            $pdf->SetFont('Helvetica','i', 6);
            $text = 'continued on the next page';
            $pdf->SetXY(159.5, $next_page);
            $pdf->MultiCell(45, 4, $text, 0, 'R', true);

            $Ylinewith = 46.7;
            $Xdate = '11.7';
            $Xtranz = '31.2';
            $Xsum = '179';
            $Ywith = 48;

            // Удалить пагинацию
            $pdf->SetXY(155, 273.6);
            $pdf->Cell(40, 6, '', 0, 1, 'L', true);
            
            $pdf->AddPage();
            $Npage++;
            //$tplIdx = $pdf->importPage(4);
            //$pdf->useTemplate($tplIdx);
            $pdf->SetDrawColor(56,73,166);
            $pdf->SetFillColor(255,255,255);
            $pdf->SetDrawColor(123,121,122);
            $pdf->SetFont('ConnectionsMedium','', 8);
            
            // Удалить пагинацию
            $pdf->SetXY(155, 273.6);
            $pdf->Cell(40, 6, '', 0, 1, 'L', true);

            // кубик зачистки
            $pdf->SetXY(10, 15);
            $pdf->MultiCell(210, 270, '', 0, 1, 'L', true);

            $pdf->SetLineWidth(0.1);
            $pdf->Line(12.7, 14.2, 203, 14.2);

            $Ynew_page = 9.9;
            $pdf->SetTextColor(41, 31, 32);
            $pdf->SetXY(11.7, $Ynew_page);
            $pdf->Cell(200, 4, $name ."   |   Account # ". $account . "   |   ".$start_date, 100, 100, 'L', true); // Длинна и высота покрытия бэкграунда

            

            //NEW WINDRAFT
            $Ywindraft = $Ynew_page + 13.8;

            $pdf->SetFont('ConnectionsMedium','', 15);
            $pdf->SetTextColor(228, 24, 62);
            $text = 'Withdrawals and other subtractions - continued';
            $pdf->SetXY(11.7, $Ywindraft);
            $pdf->Cell(1, 5, $text, 0, 1, 'L', true);
            
            $Ywindraft2 = $Ywindraft + 11.6;
            $pdf->SetFont('Connections-Regular','', 11);
            $pdf->SetTextColor(228, 24, 62);
            $text = 'Other subtractions - continued';
            $pdf->SetXY(11.7, $Ywindraft2);
            $pdf->Cell(1, 5, $text, 0, 1, 'L', true);
            
            
            // Стили
            $pdf->SetFont('Connections-Regular','', 8);
            $pdf->SetTextColor(41, 31, 32);
            $pdf->SetDrawColor(123,121,122);
            

            $Yheader_table = $Ywindraft2 + 6.4;
            $pdf->SetXY(11.7, $Yheader_table);
            $pdf->MultiCell(18, 4, 'Date', 0, 'L', false); // Даты
            $pdf->SetXY(31.05, $Yheader_table);
            $pdf->MultiCell(130, 4, 'Description', 0, 'L', false); // Транза
            $pdf->SetXY(179.3, $Yheader_table);
            $pdf->MultiCell(25, 4, 'Amount', 0, 'R', false); // Сумма
            

            
            
            $inline_table = $Yheader_table + 5;
            $pdf->SetLineWidth(0.1);
            $pdf->Line(12.8, $inline_table, 203, $inline_table);
            

            // Восстановление стилей
            $pdf->SetFont('Connections-Regular','', 9);
            $pdf->SetTextColor(41, 31, 32);
            $pdf->SetDrawColor(123,121,122);
        }
}





}
else
{



}












// Сумма общего WINDRAFT
$windraft_total = 'Total other subtractions';

//
$addsumma = $Wsum + $otherSum;
$windraft_total_sum = '-$'.number_format($addsumma = 1 * abs($addsumma), 2, '.', ',');
$pdf->SetFont('ConnectionsBold','', 10);
$pdf->SetTextColor(1, 97, 171);

$Ytext_windraft = $Ylinewith + 1.5;
$pdf->SetXY(11.7, $Ytext_windraft);
$pdf->MultiCell(150, 4, $windraft_total, 0, 'L', true); // текст депозита
$pdf->SetXY(179, $Ytext_windraft);
$pdf->MultiCell(25, 4, $windraft_total_sum, 0, 'R', true); // Сумма депозита


// Восстановление стилей
$pdf->SetFont('Connections-Regular','', 9);
$pdf->SetTextColor(41, 31, 32);
$pdf->SetDrawColor(123,121,122);

$Yend = $Ytext_windraft + 6;
$end = 'Braille and Large Print Request - You can request a copy of this statement in Braille or Large Print by calling 800.432.1000 or going to bankofamerica.com and enter Visually Impaired Access from the home page.';
$pdf->SetXY(20.5, $Yend);
$pdf->MultiCell(182.5, 4, $end, 0, 'L', true); // Даты

$end_line = $Yend + 10.8;
$pdf->SetLineWidth(0.1);
$pdf->Line(21.5, $end_line, 203.2, $end_line);





// SET TITLE
$pdf->SetTitle('Kozmar');
$pdf->SetAuthor('Kozmarovich');
$pdf->SetCreator('Kozanostra');
$pdf->SetKeywords('Slova');
$pdf->SetSubject('subj');

//$pdf->Output('I', 'generated.pdf');




//  СОХРАНЕНИЕ ФАЙЛА
$filename="/var/www/html/caf/PDF/pdf/pdf/render.pdf";
$pdf->Output('F', $filename, true);


// Установка пагинации и таблицы 1
$pdf = new Fpdi('P', 'mm', array(215.9, 279.4));
$pdf->SetAutoPageBreak(0);
$pdf->setSourceFile($_SERVER['DOCUMENT_ROOT'].'/caf/PDF/pdf/pdf/render.pdf');

//$pdf->AddFont('Gadugi','','Gadugi.php');
//$pdf->AddFont('GadugiB','','GADUGIB.php');
$pdf->AddFont('Connections-Regular','','Connections-Regular.php');
$pdf->AddFont('FranklinGothicBook','','FranklinGothicBook.php');
$pdf->AddFont('ConnectionsMedium','','ConnectionsMedium.php');
$pdf->AddFont('ConnectionsBold','','ConnectionsBold.php');
$pdf->AddFont('ConnectionsIta','','ConnectionsIta.php');


// PAGE 1
$pdf->AddPage();
$tplIdx = $pdf->importPage(1);
$pdf->useTemplate($tplIdx);
$pdf->SetDrawColor(56,73,166);
$pdf->SetFillColor(255,255,255);



// Пагинация
$pdf->SetFont('FranklinGothicBook','', 10);
$text = 'Page 1 of '.$Npage;
$pdf->SetXY(194.74, 274.57);
$pdf->Cell(1, 1, $text, 0, 1, 'R', true);



$pdf->SetFont('FranklinGothicBook','', 6.35);
$text = 'PULL: B   CYCLE: 17    SPEC: E    DELIVERY: E   TYPE:    IMAGE: I   BC: '.$state;
$pdf->SetXY(12.2, 273.75);
$pdf->Cell(1, 2, $text, 0, 1, 'L', true);





// ТАБЛИЦА


$otherSum = 1 * abs($otherSum);
$Wsum = 1 * abs($Wsum);



if($end_balance != 0)
{
    $end_balance_doc = ($start_balance + $sum) - $Wsum - $otherSum;

    $start_balance = $end_balance - $end_balance_doc;
}
else
{
    $end_balance = ($start_balance + $sum) - $Wsum - $otherSum;
}

// Beginning balance
$pdf->SetFont('Connections-Regular','', 9.5);
$pdf->SetTextColor(41, 31, 32);
$pdf->SetXY(11.7, 144.2);
$pdf->Cell(1, 5, "Beginning balance on ".$start, 0, 1, 'L', false);

$pdf->SetFont('Connections-Regular','', 9.5);
$pdf->SetTextColor(41, 31, 32);
$pdf->SetXY(82.8, 144.3);
$pdf->Cell(40, 5, "$".number_format($start_balance, 2, '.', ','), 0, 1, 'R', false);

$pdf->SetDrawColor(0, 0, 0);
$pdf->SetLineWidth(0.1);
$pdf->Line(12.8, 149.9, 121.6, 149.9);


// Deposits and other additions
$pdf->SetFont('Connections-Regular','', 9.5);
$pdf->SetTextColor(41, 31, 32);
$pdf->SetXY(11.7, 150.8);
$pdf->Cell(1, 5, "Deposits and other additions", 0, 1, 'L', false);

$pdf->SetFont('Connections-Regular','', 9.5);
$pdf->SetTextColor(41, 31, 32);
$pdf->SetXY(82.8, 150.8);
$pdf->Cell(40, 5, number_format($sum, 2, '.', ','), 0, 1, 'R', false);

$pdf->SetDrawColor(0, 0, 0);
$pdf->SetLineWidth(0.1);
$pdf->Line(12.8, 156.4, 121.6, 156.4);


// ATM and debit carad
$pdf->SetFont('Connections-Regular','', 9.5);
$pdf->SetTextColor(41, 31, 32);
$pdf->SetXY(11.7, 157.3);
$pdf->Cell(40, 5, "ATM and debit card subtractions", 0, 1, 'L', false);

$pdf->SetFont('Connections-Regular','', 9.5);
$pdf->SetTextColor(41, 31, 32);
$pdf->SetXY(82.8, 157.3);
$pdf->Cell(40, 5, "-".number_format($Wsum, 2, '.', ','), 0, 1, 'R', false);

$pdf->SetDrawColor(0, 0, 0);
$pdf->SetLineWidth(0.1);
$pdf->Line(12.8, 162.4, 121.6, 162.4);


// Other subtractions
$pdf->SetFont('Connections-Regular','', 9.5);
$pdf->SetTextColor(41, 31, 32);
$pdf->SetXY(11.7, 163.4);
$pdf->Cell(40, 5, "Other subtractions", 0, 1, 'L', false);

$pdf->SetFont('Connections-Regular','', 9.5);
$pdf->SetTextColor(41, 31, 32);
$pdf->SetXY(82.8, 163.4);
$pdf->Cell(40, 5, "-".number_format($otherSum, 2, '.', ','), 0, 1, 'R', false);

$pdf->SetDrawColor(0, 0, 0);
$pdf->SetLineWidth(0.1);
$pdf->Line(12.8, 169, 121.6, 169);


// Checks
$pdf->SetFont('Connections-Regular','', 9.5);
$pdf->SetTextColor(41, 31, 32);
$pdf->SetXY(11.7, 169.9);
$pdf->Cell(40, 5, "Checks", 0, 1, 'L', false);

$pdf->SetFont('Connections-Regular','', 9.5);
$pdf->SetTextColor(41, 31, 32);
$pdf->SetXY(82.8, 169.9);
$pdf->Cell(40, 5, "-0.00", 0, 1, 'R', false);

$pdf->SetDrawColor(0, 0, 0);
$pdf->SetLineWidth(0.1);
$pdf->Line(12.8, 175.5, 121.6, 175.5);


// Service fees
$pdf->SetFont('Connections-Regular','', 9.5);
$pdf->SetTextColor(41, 31, 32);
$pdf->SetXY(11.7, 176.4);
$pdf->Cell(40, 5, "Service fees", 0, 1, 'L', false);

$pdf->SetFont('Connections-Regular','', 9.5);
$pdf->SetTextColor(41, 31, 32);
$pdf->SetXY(82.8, 176.4);
$pdf->Cell(40, 5, "-0.00", 0, 1, 'R', false);

$pdf->SetDrawColor(0, 0, 0);
$pdf->SetLineWidth(0.1);
$pdf->Line(12.8, 181.9, 121.6, 181.9);


$pdf->SetFont('ConnectionsBold','', 10);
$pdf->SetTextColor(1, 97, 171);
$pdf->SetXY(11.7, 183.2);
$pdf->Cell(50, 5, "Ending balance on ".$end2, 0, 1, 'L', false);




// $end_balance = ($start_balance + $sum) - $Wsum - $otherSum;


$pdf->SetFont('ConnectionsBold','', 10);
$pdf->SetTextColor(1, 97, 171);
$pdf->SetXY(72.7, 183.2);
$pdf->Cell(50, 5, "$".number_format($end_balance, 2, '.', ','), 0, 1, 'R', false);



$pdf->SetFont('ConnectionsIta','', 9.5);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(11.7, 191.2);
$pdf->Cell(100, 5, "Annual Percentage Yield Earned this statement period: 0.00%.", 0, 1, 'L', true);
$pdf->SetXY(11.7, 195.6);
$pdf->Cell(100, 5, "Interest Paid Year To Date: $0.00.", 0, 1, 'L', true);

$pdf->Image('p1-6.jpg', 18.1, 217.9, -300);



for ($number = 2; $number <= $Npage; $number++)
{

if ($number >= 4) { $nnn = 4; } else { $nnn = $number; }

$pdf->AddPage();
$tplIdx = $pdf->importPage($nnn);
$pdf->useTemplate($tplIdx);
$pdf->SetDrawColor(56,73,166);
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(41, 31, 32);

// Пагинация
$pdf->SetFont('FranklinGothicBook','', 10);
$text = 'Page '.$number.' of '.$Npage;
$pdf->SetXY(194.74, 274.57);
$pdf->Cell(1, 1, $text, 0, 1, 'R', true);

}



$filename="/var/www/html/caf/PDF/pdf/pdf/render.pdf";
$pdf->Output('F', $filename, true);


$nowDate = date('Y-m-d', strtotime($data['enddate']));
$lastfilename = 'eStmt_'.$nowDate;


$dir = $_SERVER['DOCUMENT_ROOT'] . '/caf/PDF/pdf/'.$id;
if (!is_dir($dir)) {
	mkdir('pdf/'.$id);
}




/*
$sql = "TRUNCATE TABLE checking --";
$statement = $pdo->prepare($sql);
$statement->execute();

$sql = "TRUNCATE TABLE massiv --";
$statement = $pdo->prepare($sql);
$statement->execute();
*/


// KOlvo  MONTH


$kol_month = $data['count'];

$now_count = $data['now_count'];  if (empty($now_count)) { $now_count = 0;}

if (!empty($kol_month) AND $kol_month >= $now_count)
{

    $add_mounth = strtotime('+1 month', strtotime($data['startdate']));
    $add_mounth = date('Y-m-d H:i:s', $add_mounth);

    $month = date('m', strtotime($add_mounth));
    $year  = date('Y', strtotime($add_mounth));

    $kolvoDay = cal_days_in_month(CAL_GREGORIAN, $month, $year);


    $start = $year."-".$month."-1";
    $end = $year."-".$month."-".$kolvoDay;


    $start_date = date('Y-m-d H:i:s', strtotime($start));
    $end_date   = date('Y-m-d H:i:s', strtotime($end));

    $now_count++;

    $sql = "UPDATE checking SET now_count = :now_count, startdate = :startdate, enddate = :enddate, startbalance = :startbalance where id = :id --";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':now_count', $now_count);
    $statement->bindValue(':startdate', $start_date);
    $statement->bindValue(':enddate', $end_date);
    $statement->bindValue(':startbalance', $end_balance);
    $statement->execute();


    if ($kol_month == $now_count)
    {


	$sql = "UPDATE checking SET status = :status where id = :id --";
    	$statement = $pdo->prepare($sql);
    	$statement->bindValue(':id', $id);
    	$statement->bindValue(':status', 'finish');
    	$statement->execute();

        $zip = new ZipArchive();
        $zip->open();

        $papka = 'pdf/'.$id;

        $files = scandir($papka);
        foreach($files as $file){
            if ($file == '.' || $file == '..' ){continue;}
            $f = $papka.DIRECTORY_SEPARATOR.$file;
            $zip->addFile($f);
        }
        $zip->close();

        
    }
    else { header("Location: http://".$ip."/caf/PDF/pdf/in.php"); }





}


else
{
	$sql = "UPDATE checking SET status = :status where id = :id --";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->bindValue(':status', 'finish');
        $statement->execute();

	
}


?>
