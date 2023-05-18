<?php
	include '../../../../layout/layout.php';
	//echo'<div id="content0"></div>';
	// $id_cl			=$_GET['id_cl'];
	// $nom_cl			=$_GET['nom_cl'];

	$trimestre			=$_GET['trimestre'];
	$id_el				=$_GET['id_el'];
	$matricule			=$_GET['matricule'];
	$nom_el				=$_GET['nom_el'];
	$prenom_el			=$_GET['prenom_el'];
	$date_nais			=$_GET['date_nais'];

	$id_cl  			= $_GET['id_cl'];
	$nom_cl  			= $_GET['nom_cl'];

	$id_com				=$_GET['id_com'];
	$competence			=$_GET['competence'];

	//include 'crud.php';
	//$annee=2020;
?>

<input type="hidden" value="<?php echo $id_cl; ?>" id="idClass" name="">
<input type="hidden" value="<?php echo $nom_cl; ?>" id="nom_cl"  name="">
<input type="hidden" value="<?php echo $id_el; ?>" id="idClass" name="">
<input type="hidden" value="<?php echo $matricule; ?>" id="nom_cl" name="">
<input type="hidden" value="<?php echo $nom_el; ?>" id="idClass" name="">
<input type="hidden" value="<?php echo $prenom_el; ?>" id="idClass" name="">
<input type="hidden" value="<?php echo $date_nais; ?>" id="nom_cl" name="">
<input type="hidden" value="<?php echo $trimestre; ?>" id="trimestre"  name="">
<input type="hidden" value="<?php echo $id_com; ?>" id="idCom"  name="">


<div class="container-fluid">
	<div class="row">
			<div class="col-md-2">
			<ul class="list-group">
				
				  <?php
					$req = pg_query($conn, "SELECT * FROM parents JOIN eleves USING(id_par) JOIN inscriptions USING(id_el) JOIN classes USING(id_cl) WHERE  annee_ins=$annee AND status=0 AND uid=$uid order by nom_el,prenom_el");
					while ($ligne = pg_fetch_assoc($req)) {
						// $class=$ligne['id_cl'];
						// $compte = pg_query($conn,"SELECT count(*) as nb_el FROM parents JOIN eleves USING(id_par) WHERE id_par=1 AND annee=$annee");
						// $result=pg_fetch_assoc($compte);

						echo'<a href="/web/src/parents/index.php?id_el='.$ligne['id_el'].'&matricule='.$ligne['matricule'].'&nom_el='.$ligne['nom_el'].'&prenom_el='.$ligne['prenom_el'].'&date_nais='.$ligne['date_nais'].'&id_cl='.$ligne['id_cl'].'&nom_cl='.$ligne['nom_cl'].'">';
					 	echo'<li class="list-group-item d-flex justify-content-between align-items-center bg-info text-white">'.$ligne['nom_el'].' '.$ligne['prenom_el'];
					 	
			    			echo'<span class="badge badge-primary badge-pill text-white">'.$ligne['nom_cl'].'</span>';
			  			echo'</li>';
			  			echo'</a>';
					 } 

			 ?>
			 <?php
					$req = pg_query($conn, "SELECT * FROM parents2 JOIN eleves USING(id_par2) JOIN inscriptions USING(id_el) JOIN classes USING(id_cl) WHERE  annee_ins=$annee AND status=0 AND uid=$uid order by nom_el,prenom_el");
					while ($ligne = pg_fetch_assoc($req)) {
						// $class=$ligne['id_cl'];
						// $compte = pg_query($conn,"SELECT count(*) as nb_el FROM parents JOIN eleves USING(id_par) WHERE id_par=1 AND annee=$annee");
						// $result=pg_fetch_assoc($compte);

						echo'<a href="/web/src/parents/index.php?id_el='.$ligne['id_el'].'&matricule='.$ligne['matricule'].'&nom_el='.$ligne['nom_el'].'&prenom_el='.$ligne['prenom_el'].'&date_nais='.$ligne['date_nais'].'&id_cl='.$ligne['id_cl'].'&nom_cl='.$ligne['nom_cl'].'">';
					 	echo'<li class="list-group-item d-flex justify-content-between align-items-center bg-info text-white">'.$ligne['nom_el'].' '.$ligne['prenom_el'];
					 	
			    			echo'<span class="badge badge-primary badge-pill text-white">'.$ligne['nom_cl'].'</span>';
			  			echo'</li>';
			  			echo'</a>';
					 } 

			 ?>
			</ul>
		</div>
		
		<div class="col-md-10">
			<?php
				include '../../../../layout/menu4.php';
			?>

			<ol class="breadcrumb bg1">
			  <li class="breadcrumb-item"><a class="text-info" href="http://www.ellaubamako.com/web/home.php">Accueil</a></li>
			  <li class="breadcrumb-item"><a class="text-info" href="http://www.ellaubamako.com/web/src/parents/index.php">Espace parents</a></li>
			  <li class="breadcrumb-item"><a class="text-info" href="http://www.ellaubamako.com/web/src/parents/resultats/index1.php?<?php echo' id_el='.$id_el.'&matricule='.$matricule.'&nom_el='.$nom_el.'&prenom_el='.$prenom_el.'&date_nais='.$date_nais.'&trimestre='.$trimestre.''; ?>">Résultats/Notes</a></li>
			   <li class="breadcrumb-item"><a class="text-info" href="http://www.ellaubamako.com/web/src/parents/resultats/index1.php?<?php echo' id_el='.$id_el.'&matricule='.$matricule.'&nom_el='.$nom_el.'&prenom_el='.$prenom_el.'&date_nais='.$date_nais.'&trimestre='.$trimestre.''; ?>"><?php echo trimestre($trimestre); ?></a></li>
			   <li class="breadcrumb-item"><a class="text-info" href="http://www.ellaubamako.com/web/src/parents/resultats/index1.php?<?php echo' id_el='.$id_el.'&matricule='.$matricule.'&nom_el='.$nom_el.'&prenom_el='.$prenom_el.'&date_nais='.$date_nais.'&trimestre='.$trimestre.''; ?>"><b class="bleu"><?php echo $nom_cl; ?></b></a></li>
			  
			  <li class="breadcrumb-item vert"><?php echo $matricule.' '.$nom_el.' '.$prenom_el; ?></li>
			  
			</ol>
			<div class="card border-primary mb-3">
			  <div class="card-header bg">
			  	 <?php
        		$lobs=pg_query($conn,"SELECT nom_per,prenom_per from enseignants JOIN enseignants_classes USING(id_ens) WHERE id_cl=$id_cl");
        		$row_obs=pg_fetch_assoc($lobs);
			  ?>
			  	<table class="" border="0" style="font-size:14px; border-collapse: collapse;" cellpadding="0" cellspacing="0">
					<tr>
						<td><b>Bilan périodique <?php echo $nom_cl ;?></b></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						

						<td><b>Trimestre <?php echo $trimestre.' /'.($annee-1).'-'.$annee; ?><b></td>
					</tr>
					<tr>
					    <?php
                            $DateFin=date();
                    	  	$datetime1 = new DateTime($date_nais);
                        	$datetime2 = new DateTime($DateFin);
                        	$interval = $datetime1->diff($datetime2);
                        	$nbday= $interval->format('%m');
                	    ?>
						<td><b><?php echo $nom_el.' '.$prenom_el; echo'</b><b style="font-size:12px;" class="vert"> Age: '.$age=date_diff(date_create($date_nais),date_create('today'))->y.' ans / '.$nbday.' mois</b>';?></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						
						<?php if($trimestre == 1){ ?>
						<td><i>de Septembre à Novembre</i></td>
						<?php }if($trimestre == 2){ ?>
						<td><i>de Décembre à Février</i></td>
						<?php }if($trimestre == 3){ ?>
						<td><i>de Mars à Juin</i></td>
						<?php } ?>
					</tr>
					<tr>
						<td>Née le : <b style="font-size:14px;" class="vert"><?php echo $date_nais ;?></b> N<sup>o</sup>-Mat: <b style="font-size:14px;" class="vert"><?php echo $matricule; ?></b></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						

						<td><b class="vert droite">Titulaire de la classe: </b><b><?php echo $row_obs['nom_per'].' '.$row_obs['prenom_per']; ?></b></td>
					</tr>
				</table>
			  </div>
			  
			  <div class="card-body">
			        <table class="table table-hover table-stripedp text-info" >
                        <tr>
                            <td>Objectifs d'apprentissage:&nbsp;</td>
                           <td>NA = Non atteints,</td>
                           <td>PA = Partiellement atteints,</td>
                           <td>A = Atteints,</td>
                           <td>D = Dépassés</td>
                        </tr>
                    </table>
					<table class="table table-hover table-stripedp" id="manageResultatsTable" border="1">
					  <thead>
						<tr class="table-success">
							<?php  
							
							if($trimestre == 1){    
							    $absences=pg_query($conn,"SELECT count(*) as abs1 FROM absences WHERE etat_pre=1 AND periode_abs='Trimestre 1' AND id_el=$id_el AND annee=$annee");
							    $retards=pg_query($conn,"SELECT count(*) as ret1 FROM absences WHERE etat_pre=0 AND periode_abs='Trimestre 1' AND id_el=$id_el AND annee=$annee");
							    $sanctions=pg_query($conn,"SELECT count(*) as sanc1 FROM sanctions WHERE  periode_sa='T1' AND id_el=$id_el AND annee_sa=$annee");

							    $s=pg_fetch_assoc($sanctions);
							        $sanc1=$s['sanc1'];

							    $a=pg_fetch_assoc($absences);
							    $abs1=$a['abs1'];

							    $r=pg_fetch_assoc($retards);
							    $ret1=$r['ret1'];
							}
							if($trimestre == 2){
							    $absences=pg_query($conn,"SELECT count(*) as abs2 FROM absences WHERE etat_pre=1 AND periode_abs='Trimestre 2' AND id_el=$id_el AND annee=$annee");
							    $retards=pg_query($conn,"SELECT count(*) as ret2 FROM absences WHERE etat_pre=0 AND periode_abs='Trimestre 2' AND id_el=$id_el AND annee=$annee");
							    $sanctions=pg_query($conn,"SELECT count(*) as sanc2 FROM sanctions WHERE  periode_sa='T2' AND id_el=$id_el AND annee_sa=$annee");

							    $s=pg_fetch_assoc($sanctions);
							        $sanc2=$s['sanc2'];

							    $a=pg_fetch_assoc($absences);
							    $abs2=$a['abs2'];

							    $r=pg_fetch_assoc($retards);
							    $ret2=$r['ret2'];

							}
							if($trimestre == 3){
							$absences=pg_query($conn,"SELECT count(*) as abs3 FROM absences WHERE etat_pre=1 AND periode_abs='Trimestre 3' AND id_el=$id_el AND annee=$annee");
							$retards=pg_query($conn,"SELECT count(*) as ret3 FROM absences WHERE etat_pre=0 AND periode_abs='Trimestre 3' AND id_el=$id_el AND annee=$annee");

							$sanctions=pg_query($conn,"SELECT count(*) as sanc3 FROM sanctions WHERE  periode_sa='T3' AND id_el=$id_el AND annee_sa=$annee");
							    $s=pg_fetch_assoc($sanctions);
							        $sanc3=$s['sanc3'];

							$a=pg_fetch_assoc($absences);
							$abs3=$a['abs3'];

							$r=pg_fetch_assoc($retards);
							$ret3=$r['ret3'];
							   
							}
							?>
						    <?php //if($trimestre != 1){ ?>
						  <th rowspan="2" colspan="3" class="text-info"><?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Absences:&nbsp;'.($trimestre == 1? $abs1 : ($trimestre == 2? $abs2 : $abs3)).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Retards:&nbsp;'.($trimestre == 1? $ret1 : ($trimestre == 2? $ret2 : $ret3)).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sanction:&nbsp;'.($trimestre == 1? $sanc1 : ($trimestre == 2? $sanc2 : $sanc3)); ?></th>
						  <th colspan="3" class="centre text-info">TRIMESTRE <?php echo $trimestre; ?></th>
						</tr>
						
						<tr colspan="3">

						</tr>
					<?php //}

				    $familles=pg_query($conn,"SELECT id_fa,nom_fa from elementaire.evaluations join competences using(id_com) join matieres using(id_ma) join familles using(id_fa) where id_el=$id_el  AND periode=$trimestre  and annee=$annee  group by nom_fa,id_fa order by nom_fa");

				    while($f=pg_fetch_assoc($familles)){
				        echo '<tr class="">';
				        if ($l['sm']==0) {
				            echo '<td class="droite vert" colspan="3"  style="font-weight: bold;">'.$f['nom_fa'].'</td>';

                            $trimestres = pg_query($conn,"SELECT * FROM trimestres WHERE  nom_tri='T$trimestre' AND annee=$annee");
                      		$ts=pg_fetch_assoc($trimestres);
                      		$date_fin=$ts['datefin'];
                      		//if($gid != 1)
                      		if($date_fin > date('d-m-Y'))
                            echo '<td class="centre bleu Gras" style="font-weight: bold;">'.$f['note'].'</td>'; 
                         
                        } 
           
        echo '</tr>';
        $id_fa=$f['id_fa'];
        $resultat=pg_query($conn," SELECT * from elementaire.evaluations join competences using(id_com) join matieres using(id_ma) join familles using(id_fa) join titres using(id_ti) where id_el=$id_el and familles.id_fa=$id_fa AND periode=$trimestre and annee=$annee order by id_ma");


        $nom_ma_defaut='';
        $nom_ti_defaut='';
        $i=0;
        while($l=pg_fetch_assoc($resultat)){
        $id_ma=$l['id_ma'];
        $id_ti=$l['id_ti'];
		    $rcount=pg_query($conn,"select count(id_ma) as nb_ma from matieres where id_fa=$id_fa");
		    $resul=pg_fetch_assoc($rcount);
		    $nb_ma=$resul['nb_ma'];

		    if ($nom_ma_defaut!=$l['nom_ma'] and ($nom_ti_defaut!=$l['nom_ti'] or $nom_ti_defaut==$l['nom_ti'])){
		 
		            if($nb_ma > 1){
		            echo '<tr>';
		            echo '<td></td>';
		            if ($l['sm']==1) {
		            echo '<td colspan="2" class="gauche bleu" font-size: 10px;"><i>'.$l['nom_ma'].'</i></td>';
		            echo '<td></td>';
		              }
		        echo '</tr>';}
		        //     if($id_ti > 0){
		        //     echo '<tr>';
		        //     echo '<td></td>';
		        //     echo '<td colspan="2" class="gauche bleu" style="font-size: 13px;">'.$l['nom_ti'].'</td>';
		        //     echo '<td></td>';
		        // echo '</tr>';}

		    }
		        $nom_ma_defaut=$l['nom_ma'];
		            echo '<tr class="">';
                        echo '<td>&nbsp;'.($i+1).'&nbsp;</td>';
                        echo '<td class="gauche" colspan="2">'.$l['competence'].'</td>';
			            echo '<td class="centre Normal">'.$l['note1'].'</td>';
			            echo '<td class="centre Normal">'.$l['note2'].'</td>';
			            echo '<td class="centre Normal">'.$l['note3'].'</td>';

                                      
			        echo '</tr>';     
			                $i++;

			            }  
			        } 
			        echo '</table>';
        		?>
					  </thead>
                     <?php if($trimestre == 1){ ?>
							<tbody>
        			<tr>
          			<td>
            			<img src="/Images/message2.png" width="100%" height="80%" alt="messages">
          			</td>
        			</tr>
      			</tbody> 
    				<?php } ?>
					</table> 
			  </div>

			</div>
 <?php //} ?>
		</div>
	</div>
</div>


<!-- include matieres matieres.js -->
<script type="text/javascript" src="/assets/js/custom/parents/resultatsE.js"></script>

<?php
	include '../../../../layout/footer.php';
?>