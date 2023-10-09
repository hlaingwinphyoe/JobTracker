<?php

namespace App\Traits;

use App\Policies\TermsAndConditionsPolicy;
use App\Policies\PrivacyPolicyPolicy;

trait FAQTrait
{
    use TermsAndConditionsPolicy, PrivacyPolicyPolicy;
}