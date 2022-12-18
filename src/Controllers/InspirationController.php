<?php
namespace Justcrm\Crm\Controllers;

use Justcrm\Crm\Model\Inspire;

class InspirationController
{
    public function __invoke(Inspire $inspire) {

        $quote = $inspire->justDoIt();

        return view('inspire::index', compact('quote'));
    }
}
