<?php
try {
	$user = 'root';
	$pass = '';
    $conn = new PDO('mysql:host=localhost;dbname=tms', $user, $pass);



    /*foreach($dbh->query('SELECT * from FOO') as $row) {
        print_r($row);
    }
    $dbh = null;*/
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}	


$stmt = $conn->prepare('SELECT * FROM tmss_produto LIMIT 100');
$stmt->execute();
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


<table class="table table-dark table table-bordered" width="50%">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Qrcode</th>
			<th>Nome</th>
			<th>Qrcode</th>
		</tr>
	</thead>
	<tbody>
<?php
	$coluns = $stmt->rowCount();

	$pNumColunas = 2; 

	echo $coluns;
	

   for($i = 0; $i <= $coluns; ++$i) 
    {
        for ($intCont = 0; $intCont < $pNumColunas; $intCont++) 
        {
            $linha = $stmt->fetch();;

            if ($i > $linha) 
            {
                if ( $intCont < $pNumColunas-1) 
                    echo "</tr>\n\n";
                    
                break;
            }
            $codigo = $linha[0];
            $texto = $linha[1];
            if ( $intCont == 0 ) echo "<tr>\n\n";

	   
			echo "
				<td>" . $linha['pro_nome'] ."</td>
				<td>" . $linha['pro_qrcode'] . "</td>
			";

							
          /*  
            echo "<td width='25%' class='style1' align='center'>
            <a href='pagina.php"' target='_blank'>".$linha[3]."<br>
            ".$linha[1]."</a><br><br></td>";            
*/
            if ( $intCont == $pNumColunas-1 ) 
            {
                echo "</tr>\n\n";
            } 
            else
            { 
                $i++; 
            }
        }
    }


	$colunas=4; //quantidade de colunas
	$cont=1; //contador

	/*while($row = $stmt->fetch()) {

		echo $cont;

		echo "
			<td>" . $row['pro_nome'] ."</td>
			<td>" . $row['pro_qrcode'] . "</td>
		";



		if($coluns = $cont){

		}else{

		echo '</tr>';
		}

		$cont++;



	}*/
?>
