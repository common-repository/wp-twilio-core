<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Autopilot\V1\Assistant\Task;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class TaskActionsTest extends HolodeckTestCase {
    public function testFetchRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->autopilot->v1->assistants("UAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                        ->tasks("UDXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                        ->taskActions()->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://autopilot.twilio.com/v1/Assistants/UAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Tasks/UDXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Actions'
        ));
    }

    public function testFetchResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "assistant_sid": "UAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "task_sid": "UDdddddddddddddddddddddddddddddddd",
                "data": {},
                "url": "https://autopilot.twilio.com/v1/Assistants/UAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Tasks/UDdddddddddddddddddddddddddddddddd/Actions"
            }
            '
        ));

        $actual = $this->twilio->autopilot->v1->assistants("UAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                              ->tasks("UDXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                              ->taskActions()->fetch();

        $this->assertNotNull($actual);
    }

    public function testUpdateRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->autopilot->v1->assistants("UAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                        ->tasks("UDXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                        ->taskActions()->update();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'post',
            'https://autopilot.twilio.com/v1/Assistants/UAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Tasks/UDXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Actions'
        ));
    }

    public function testUpdateResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "assistant_sid": "UAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "task_sid": "UDdddddddddddddddddddddddddddddddd",
                "data": {},
                "url": "https://autopilot.twilio.com/v1/Assistants/UAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Tasks/UDdddddddddddddddddddddddddddddddd/Actions"
            }
            '
        ));

        $actual = $this->twilio->autopilot->v1->assistants("UAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                              ->tasks("UDXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                              ->taskActions()->update();

        $this->assertNotNull($actual);
    }
}