<?php

declare(strict_types=1);

namespace EinzEnte\SoupKit;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\item\Item;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\MushroomStew;

class Main extends PluginBase implements Listener{
 
  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this,$this);
  }
  
  public function onInteract(PlayerInteractEvent $event){
    $souper = $event->getPlayer();
    $soup = $souper->getInventory()->getItemInHand();
    if($soup instanceof MushroomStew){
      $health = $souper->getHealth();
      if($health < 20){
        $souper->setHealth($souper->getHealth()+2);
        $souper->getInventory()->setItemInHand(Item::get(0,0,1));
        $souper->getInventory()->setItemInHand(Item::get(Item::BOWL,0,1));        
      } else {
        return;
      }
    } else {
      return;
    }
  }
  
}
