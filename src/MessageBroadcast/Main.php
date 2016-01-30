<?php

  namespace MessageBroadcast;

  use pocketmine\plugin\PluginBase;
  use pocketmine\event\Listener;
  use pocketmine\utils\TextFormat as TF;
  use pocketmine\command\Command;
  use pocketmine\command\CommandSender;
  use pocketmine\command\CommandExecutor;

  class Main extends PluginBase implements Listener {

    public function onEnable() {

      $this->getServer()->getPluginManager()->registerEvents($this, $this);

    }

    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {

      if(strtolower($cmd->getName()) === "broadcast") {

        if(!(isset($args[0]))) {

          $sender->sendMessage(TF::RED . "Error: not enough args!");

        } else {

          $message = implode(" ", $args);

          $this->getServer()->broadcastMessage($message);
          $sender->sendMessage(TF::GREEN . "Successfully broadcasted message!");

        }

      }

    }

  }

?>
