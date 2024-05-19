<?php
// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response  = "CON Turwanye imirire mibi yabana  Hitamo imyaka yumwana \n \n";
    $response .= "1) Amezi 6 ya mbere \n";
    $response .= "2) Amezi 6 kugeza ku mwaka \n";
    $response .= "3) Umwaka kugeza ku myaka 2\n";
    $response .= "4) imyaka 2 kugeza ku myaka 3 \n";
    $response .= "5) imyaka 3 kugeza ku myaka 4 \n";
    $response .= "6) imyaka 4 kugeza ku myaka 5 \n";


} else if ($text == "1") {
    // Business logic for first level response
    $response =" END Mu mezi atandatu ya mbere, onsa gusa\n Ntukagire ikindi uha umwana wawe mu mezi 6 ya mbere, kabone n’amazi. \n Amazi, ibindi binyobwa cyangwa ibindi biribwa bishobora gutera umwana
    wawe uburwayi.";
   

} else if ($text == "2") {
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