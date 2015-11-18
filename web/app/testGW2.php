<?php
namespace App;
use DOMDocument;
use App\Player;

class testGW2 {

    public function run($html)
    {
        $DOM = new DOMDocument;
        libxml_use_internal_errors(true);
        $DOM->loadHTML($html);

        $name = $this->getElementsByClass($DOM,'td','name');

        $names = [];
        foreach ($name as $k => $v ) {
            $names[] = trim($v->nodeValue);
        }

        foreach ($names as $name) {
            $p = Player::where('account',$name)->get();
            if (count($p)==0){
                $p = new Player();
                $p->account = $name;
                $p->status = Player::ENABLED;
                $p->save();
            }
        }

        $players = Player::all();
        foreach($players as $player)
        {
            if ( !in_array($player->account,$names) ){
                if( $player->hasDonations() ){
                    $player->status = Player::DISABLED;
                    $player->save();
                }else{
                    $player->delete();
                }
            }
        }

        return $names;
    }

    private function getElementsByClass(&$parentNode, $tagName, $className) {
        $nodes=array();

        $childNodeList = $parentNode->getElementsByTagName($tagName);
        for ($i = 0; $i < $childNodeList->length; $i++) {
            $temp = $childNodeList->item($i);
            if (stripos($temp->getAttribute('class'), $className) !== false) {
                $nodes[]=$temp;
            }
        }

        return $nodes;
    }

}
