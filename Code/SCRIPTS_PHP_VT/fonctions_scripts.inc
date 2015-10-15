<?
// déclaration des constantes (tableaux)
$horairesReels = array(700, 700, 700, 700, 700, 700, 700);

//$jours = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday","Sunday");
$jours = array("lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi","dimanche");
$nbj = 6;

$horaires = array( "700",  "715",  "730",  "745",  
                  "800",  "815",  "830",  "845", 
                  "900",  "915",  "930",  "945",
                 "1000", "1015", "1030", "1045", 
                 "1100", "1115", "1130", "1145",
                 "1200", "1215", "1230", "1245", 
                 "1300", "1315", "1330", "1345",
                 "1400", "1415", "1430", "1445", 
                 "1500", "1515", "1530", "1545",
                 "1600", "1615", "1630", "1645", 
                 "1700", "1715", "1730", "1745",
                 "1800", "1815", "1830", "1845", 
                 "1900", "1915", "1930", "1945", 
                 "2000", "2015", "2030", "2045", 
                 "2100", "2115");
$nbh = 58;

// récuperation des valeurs saisis dans le formulaire
function supprimer_encodage_mq($valeur){
//si magic quotes est actif, retourner la valeur après suppression de l'encodage
//(=> appel à stripslashes), sinon, retourner la valeur
return (get_magic_quotes_gpc())?stripslashes($valeur):$valeur;
}

function valeur_saisie($valeur){
 return supprimer_encodage_mq(trim($valeur));
}

/*function vers_formulaire($valeur){
 //affichage dans un formulaire: encoder tous les caractères HTML speciaux
 //ENT_QUOTES : dont " et '
   return htmlentities($valeur, ENT_QUOTES);
   }
*/
   
function vers_page($valeur){
/* affichage direct dans une page :
   1 encoder tous les caractères HTML spéciaux -ENT_QUOTES : dont " et '
   2 transformer les sauts de lignes en <BR> */
   return nl2br(htmlentities($valeur, ENT_QUOTES));
}

// conversion chaine  --> heure décimale ex: "8h15" --> 8.25
function strtodech($h){
  $hdec = explode("h", $h);
  return $hdec[0]+ $hdec[1]/60 ;
}

// conversion heure décimale --> chaine ex: 8.25 --> "8h15"
function dechtostr($h){
  $hstr= explode(".", $h);
  switch ($hstr[1]) {
    case "" : return $hstr[0]. "h00"; break;
    case "25" : return $hstr[0]. "h15"; break;
    case "5" : return $hstr[0]. "h30"; break;
    case "75" : return $hstr[0]. "h45"; break;
  }
}

// conversion chaîne heure  --> chaîne ex:  "18:45:00" --> "18h45"
function htostr($h){
  // $str = explode(":", $h);
  // return $str[0]."h".$str[1];
  return $h;
}

// nombre de quart-d'heure x doit etre au format 230 pour 2h30

function nbQuarts($x) {
$h = floor($x / 100);
$nb = $h * 4;
$m = $x - (100 * $h);
$nb = $nb + ($m / 15);
return $nb;
}

function heureToHeureDecimal($x){
$heure = floor($x / 100);
$minute = ($x - (100 * floor($x / 100))) * 100 / 60;
return(100*$heure + $minute);
}


function heureDecimalToHeure($x){
$heure = floor($x / 100);
$minute = ($x - (100 * floor($x / 100))) * 60 / 100;
return(100*$heure + $minute);
}

function heureBdToMinutes($x){
$heure = floor($x / 100);
$minute = $heure*60 + ($x - (100 * $heure));
return $minute;
}

function partieHeure($h) {
return floor($h / 100);
}

function partieMinute($h) {
return ($h - (100 * floor($h / 100)));
}

function dateFrancaise($d){
$date = explode("-", $d);
setlocale(LC_TIME, "fr");                                                      
return $date[2]."/".$date[1]."/".$date[0];	
}

function numero_semaine($jour,$mois,$annee)
{
    /*
     * Norme ISO-8601:
     * - La semaine 1 de toute année est celle qui contient le 4 janvier ou que la semaine 1 de toute année est celle qui contient le 1er jeudi de janvier.
     * - La majorité des années ont 52 semaines mais les années qui commence un jeudi et les années bissextiles commençant un mercredi en possède 53.
     * - Le 1er jour de la semaine est le Lundi
     */ 
    
    // Définition du Jeudi de la semaine
    if (date("w",mktime(12,0,0,$mois,$jour,$annee))==0) // Dimanche
        $jeudiSemaine = mktime(12,0,0,$mois,$jour,$annee)-3*24*60*60;
    else if (date("w",mktime(12,0,0,$mois,$jour,$annee))<4) // du Lundi au Mercredi
        $jeudiSemaine = mktime(12,0,0,$mois,$jour,$annee)+(4-date("w",mktime(12,0,0,$mois,$jour,$annee)))*24*60*60;
    else if (date("w",mktime(12,0,0,$mois,$jour,$annee))>4) // du Vendredi au Samedi
        $jeudiSemaine = mktime(12,0,0,$mois,$jour,$annee)-(date("w",mktime(12,0,0,$mois,$jour,$annee))-4)*24*60*60;
    else // Jeudi
        $jeudiSemaine = mktime(12,0,0,$mois,$jour,$annee);
    
    // Définition du premier Jeudi de l'année
    if (date("w",mktime(12,0,0,1,1,date("Y",$jeudiSemaine)))==0) // Dimanche
    {
        $premierJeudiAnnee = mktime(12,0,0,1,1,date("Y",$jeudiSemaine))+4*24*60*60;
    }
    else if (date("w",mktime(12,0,0,1,1,date("Y",$jeudiSemaine)))<4) // du Lundi au Mercredi
    {
        $premierJeudiAnnee = mktime(12,0,0,1,1,date("Y",$jeudiSemaine))+(4-date("w",mktime(12,0,0,1,1,date("Y",$jeudiSemaine))))*24*60*60;
    }
    else if (date("w",mktime(12,0,0,1,1,date("Y",$jeudiSemaine)))>4) // du Vendredi au Samedi
    {
        $premierJeudiAnnee = mktime(12,0,0,1,1,date("Y",$jeudiSemaine))+(7-(date("w",mktime(12,0,0,1,1,date("Y",$jeudiSemaine)))-4))*24*60*60;
    }
    else // Jeudi
    {
        $premierJeudiAnnee = mktime(12,0,0,1,1,date("Y",$jeudiSemaine));
    }
        
    // Définition du numéro de semaine: nb de jours entre "premier Jeudi de l'année" et "Jeudi de la semaine";
    $numeroSemaine =     ( 
                    ( 
                        date("z",mktime(12,0,0,date("m",$jeudiSemaine),date("d",$jeudiSemaine),date("Y",$jeudiSemaine))) 
                        -
                        date("z",mktime(12,0,0,date("m",$premierJeudiAnnee),date("d",$premierJeudiAnnee),date("Y",$premierJeudiAnnee))) 
                    ) / 7 
                ) + 1;
    
    // Cas particulier de la semaine 53
    if ($numeroSemaine==53)
    {
        // Les années qui commence un Jeudi et les années bissextiles commençant un Mercredi en possède 53
        if (date("w",mktime(12,0,0,1,1,date("Y",$jeudiSemaine)))==4 || (date("w",mktime(12,0,0,1,1,date("Y",$jeudiSemaine)))==3 && date("z",mktime(12,0,0,12,31,date("Y",$jeudiSemaine)))==365))
        {
            $numeroSemaine = 53;
        }
        else
        {
            $numeroSemaine = 1;
        }
    }
        
    //echo $jour."-".$mois."-".$annee." (".date("d-m-Y",$premierJeudiAnnee)." - ".date("d-m-Y",$jeudiSemaine).") -> ".$numeroSemaine."<BR>";
            
    return sprintf("%02d",$numeroSemaine);
}

function typeMatiereClair($x){
switch ($x) {
    case 1 : return "CR"; break;
    case 2 : return "TD"; break;
    case 3 : return "TP"; break;
    case 4 : return "PROJ"; break;
    case 5 : return "SEMI"; break;
    case 6 : return "STA"; break;
    case 7 : return "ADMIN"; break;
    case 8 : return "JURY"; break;
    case 9 : return "DS"; break;
    case 10 : return "RES"; break;
    default: return "pb ?"; break;
  }
} 	

function typeCouleur($x){
switch ($x) {
    case "1" : return "typeCR"; break;
    case "2" : return "typeTD";	break;
    case "3" : return "typeTP"; break;
    case "4" : return "typePRO"; break;
    case "5" : return "typeSEMI"; break;
    case "6" : return "typeSTAGE"; break;
    case "7" : return "typeADMIN"; break;
    case "8" : return "typeJURY"; break;
    case "9" : return "typeDS"; break;
    case "10" : return "typeRESER"; break;
  }
}
   
function redirection($page) {
  echo "<script language='Javascript'>";
  echo "<!--\n";
  echo "location.href =\"$page\";\n";
  echo "// -->";
  echo "</script>\n";
}

    
    
###################################################
#
# DESCRIPTION:
# This function returns the last occurance of a string,
# rather than the last occurance of a single character like
# strrpos does. It also supports an offset from where to
# start the searching in the haystack string.
#
# ARGS:
# $haystack (required) -- the string to search upon
# $needle (required) -- the string you are looking for
# $offset (optional) -- the offset to start from
#
# RETURN VALS:
# returns integer on success
# returns false on failure to find the string at all
#
###################################################

function strrpos_string($haystack, $needle, $offset = 0)
{
   if(trim($haystack) != "" && trim($needle) != "" && $offset <= strlen($haystack))
   {
       $last_pos = $offset;
       $found = false;
       while(($curr_pos = strpos($haystack, $needle, $last_pos)) !== false)
       {
           $found = true;
           $last_pos = $curr_pos + 1;
       }
       if($found)
       {
           return $last_pos - 1;
       }
       else
       {
           return false;
       }
   }
   else
   {
       return false;
   }
}
   

// retourne les valeurs pour les connexions aux BD
function getHost($x){
return "localhost"; 
}

function getDatabase($x){
return "VT3_ISTV"; 
} 

function getLogin($x){
return "root";
}

function getPassword($x){
return "";
}    

?>
