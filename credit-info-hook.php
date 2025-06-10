<?php

add_hook('ClientAreaHomepagePanels', 1, function($homePagePanels) {

  // Get the client data and check ID is valid
  $client = Menu::context("client");
  $clientId = intval($client->id);
  if ($clientId === 0) {return;}

  $newPanel = $homePagePanels->addChild(
      'clientCreditWidget',
      array(
          'name' => 'Account Credit',
          'label' => Lang::trans('statscreditbalance'),
          'icon' => 'fas fa-money-bill',
          'order' => '99',
          'extras' => array(
              'color' => 'orange',
              'btn-link' => 'https://domain.com/clientarea.php?action=addfunds',
              'btn-text' => Lang::trans('addfunds'),
              'btn-icon' => 'fas fa-plus',
          ),
      )
  );

  $newPanel->addChild(
      'clientCreditWidget-content',
      array(
          'label' => '<h3 class="text-center pt-3 pb-2">' . formatcurrency($client->credit, $client->currencyId) . '</h3>',
          'order' => 1,
      )
  );
});
