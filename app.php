<?php
ini_set("soap.wsdl_cache_enabled", 0);

function sayHello($in) {
  $ret = new StdClass();
  $ret->message = "Hello " . $in->message;
  return $ret;
}
try {
  $server = new SOAPServer(
    'app.wsdl'
  );
  $server->addFunction('sayHello');
  $server->handle();
} catch (SOAPFault $f) {
  print $f->faultstring;
}
?>
