<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Preview\Trustedcomms;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class CurrentCallTest extends HolodeckTestCase {
    public function testFetchRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->trustedComms->currentCalls()->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://preview.twilio.com/TrustedComms/CurrentCall'
        ));
    }

    public function testReadFoundResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "bg_color": "#fff",
                "caller": "Owl Bank",
                "created_at": "2019-05-01T20:00:00Z",
                "font_color": "#f22f46",
                "from": "+1500123",
                "logo": "https://www.twilio.com/marketing/bundles/company/img/logos/red/twilio-logo-red.png",
                "manager": "Twilio",
                "reason": "Hello Jhon, your bank appointment has been confirmed.",
                "shield_img": "https://www.twilio.com/marketing/bundles/company/img/badges/red/twilio-badge-red.png",
                "sid": "CQaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "status": "ringing",
                "to": "+1500456",
                "url": "https://preview.twilio.com/TrustedComms/CurrentCall",
                "use_case": "conversational"
            }
            '
        ));

        $actual = $this->twilio->preview->trustedComms->currentCalls()->fetch();

        $this->assertNotNull($actual);
    }
}