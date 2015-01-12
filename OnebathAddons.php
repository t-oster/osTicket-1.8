<?php
class OnebathAddons {
    static function replaceAutomatLinks($html)
    {
      $html = preg_replace('/((A|BE)-[0-9]+)/i', '<a class="auftrag" href="automat://auftrag/$1">$1</a>', $html);
      $html = preg_replace('/(n[0-9]+)/i', '<a href="automat://artikel/$1">$1</a>', $html);
      $html = preg_replace('/([0-9]{3}-[0-9]{7}-[0-9]{7})/i', '<a class="auftrag" href="automat://auftrag/$1">$1</a>', $html);
      $html = preg_replace("/(AG-[0-9]+)/i", '<a class="angebot" href="automat://angebot/$1">$1</a>', $html);
      $html = preg_replace("/(RE-[0-9]+)/i", '<a class="rechnung" href="automat://rechnung/$1">$1</a>', $html);
      $html = preg_replace("/(2000[0-9]{5} )/i", '<a href="http://numerobis.onebath.intra.net/ght/index.php?referenznummer=$1">$1</a><a href="https://www.ght-profishop.de/sales/order/ajax/oid/$1/">-&gt;GHT</a>', $html);
      $html = preg_replace("/( 0[1-9][1-9][ -\/]?[0-9][0-9][0-9]+ )/i","<a href='automat://call/$1'>$1</a>", $html);
      $html = preg_replace("/#([0-9]{6})([^0-9;\"])/i", '<a href="http://support.one-bath.de/scp/tickets.php?tid=$1">#$1</a>$2', $html);
      return $html; 
    }
}
