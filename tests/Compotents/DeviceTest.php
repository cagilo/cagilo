<?php

declare(strict_types=1);

namespace Cagilo\UI\Tests\Compotents;

use Cagilo\UI\Components\Device;
use Cagilo\UI\Tests\ComponentTestCase;
use Jenssegers\Agent\Agent;

class DeviceTest extends ComponentTestCase
{
    /**
     * @param string $userAgent
     * @param bool   $desktop
     * @param bool   $phone
     * @param bool   $tablet
     * @param bool   $robot
     * @param bool   $other
     *
     * @return bool
     */
    protected function isShowComponent(
        string $userAgent,
        bool   $desktop = false,
        bool   $phone = false,
        bool   $tablet = false,
        bool   $robot = false,
        bool   $other = false
    ): bool
    {
        $agent = new Agent();

        $agent->setUserAgent($userAgent);

        return (new Device($agent, $desktop, $phone, $tablet, $robot, $other))->shouldRender();
    }

    public function testRobot(): void
    {
        $view = $this->isShowComponent('Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', robot: true);
        $this->assertTrue($view);
    }

    public function testMobile(): void
    {
        $view = $this->isShowComponent('Mozilla/5.0 (iPhone; U; ru; CPU iPhone OS 4_2_1 like Mac OS X; ru) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8C148a Safari/6533.18.5', phone: true);
        $this->assertTrue($view);
    }

    public function testDesktop(): void
    {
        $view = $this->isShowComponent('Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11) AppleWebKit/601.1.56 (KHTML, like Gecko) Version/9.0 Safari/601.1.56', desktop: true);
        $this->assertTrue($view);
    }

    public function testTablet(): void
    {
        $view = $this->isShowComponent( 'Mozilla/5.0 (Linux; U; Android 4.0.3; en-us; ASUS Transformer Pad TF300T Build/IML74K) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Safari/534.30', tablet: true);
        $this->assertNotNull($view);
    }

    public function testCombinate(): void
    {
        $view = $this->isShowComponent( 'Mozilla/5.0 (Linux; U; Android 4.0.3; en-us; ASUS Transformer Pad TF300T Build/IML74K) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Safari/534.30', phone: true, tablet: true);
        $this->assertTrue($view);
    }

    public function testNotShow(): void
    {
        $view = $this->isShowComponent('');
        $this->assertFalse($view);
    }

}
