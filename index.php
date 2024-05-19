<?php
// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response  = "CON Welcome to The Heal Space \n Choose a Test you want to take \n \n";
    $response .= "1) Depression Test \n";
    $response .= "2) Anxiety Test \n";
    $response .= "3) PTSD(Post Traumatic Stress Disorder)\n";

} else if ($text == "1") {
    // Business logic for first level response
    $response ="CON Over the last 2 weeks, how often have you been \n
    bothered by any of the following problems?\n\n\n
    1. Little interest or pleasure in doing things\n\n
    ";
    $response .= "0) Not at all \n";
    $response .= "1) Several days \n";
    $response .= "2) More than half the days\n";
    $response .= "3) Nearly every day\n";
 
} 
else if ($text == "1*0") {
    
    $response ="CON Over the last 2 weeks, how often have you been \n
    bothered by any of the following problems?\n\n\n
    2. Feeling down, depressed, or hopeless\n\n
    ";
    $response .= "0) Not at all \n";
    $response .= "1) Several days \n";
    $response .= "2) More than half the days\n";
    $response .= "3) Nearly every day\n";

}











else if ($text == "2") {
    // Business logic for first level response
    // This is a terminal request. Note how we start the response with END
    $response = " CON Imirire \n \n";
    $response .= "1) Abwiriza yibanze \n";
    $response .= "2) Amoboko yibiribwa \n";
    $response .= "3) Amafunguro ateguye\n";
} else if($text == "2*1") { 
    // This is a second level response where the user selected 1 in the first instance
    $response = " CON Umwana niyuzuza amezi 6, tangira umuhe ubundi bwoko bw’ibiryo.\n";
    $response .= "Amashereka akomeza kuba ingenzi mu bigize indyo y’umwana wawe\n";
    $response .= "Ha umwana amashereka buri gihe mbere yo kumuha ibiryo \n";
    $response.="Umwana ashobora gukenera igihe kinini kugira ngo amenyere
    kurya ubundi bwoko bw’ibiryo bitari amashereka.\n";
    $response.="Ihangane, shishikariza umwana wawe kurya ubyitayeho, ariko
    ntukabimuhatire.\n";  
     
}

else if($text == "2*2") { 
    // This is a second level response where the user selected 1 in the first instance
    $response = " CON Indyo yuzuye igirwa\n \n";
    $response .= "1) Ibitera imbaraga\n";
    $response .= "2) Ibyubaka umubiri \n";
    $response .= "3) Ibirinda indwara\n";
    
    
}
else if($text == "2*2*1") { 
    // This is a second level response where the user selected 1 in the first instance
    $response = " CON Ibiribwa bitera imbaraga(ibinyamafufu)\n\n";
    $response .= "-Ibirayi\n";
    $response .= "-Igitoki\n";
    $response .= "-Ibihaza\n";
    $response .= "-Amakaroni y'abana\n";

    
    
}
else if($text == "2*2*2") { 
    // This is a second level response where the user selected 1 in the first instance
    $response = " CON Ibyubaka umubiri(Ibinyameke n'ibikomoka ku matungo)\n\n";
    $response .= "- Igikoma(amasaka,ibigori)\n";
    $response.="- Igikoma(uburo,ingano)\n";
    $response .= " -Amagi\n";
    $response .= " -Amafi\n";
    $response .= " -Inyama\n";
    $response .=  " -Ibishyimbo";
    $response .= " -Indagara(ziseye)\n";
    $response .= " -Ubunyobwa\n";
    

    
    
}


// Echo the response back to the API
header('Content-type: text/plain');
echo $response;
?>