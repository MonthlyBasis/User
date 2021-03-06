<?php
namespace LeoGalleguillos\UserTest\View\Helper;

use LeoGalleguillos\String\Model\Service as StringService;
use LeoGalleguillos\User\Model\Entity as UserEntity;
use LeoGalleguillos\User\View\Helper as UserHelper;
use LeoGalleguillos\User\Model\Service as UserService;
use PHPUnit\Framework\TestCase;

class UserHtmlTest extends TestCase
{
    protected function setUp()
    {
        $this->escapeService = new StringService\Escape();
        $this->rootRelativeUrlService = new UserService\RootRelativeUrl();
        $this->userHtmlHelper = new UserHelper\UserHtml(
            $this->escapeService,
            $this->rootRelativeUrlService
        );
    }

    public function testInvoke()
    {
        $userEntity = new UserEntity\User();
        $userEntity->setUserId(12345);
        $userEntity->setUsername('LeoGalleguillos');
        $html = '<a href="/users/12345/LeoGalleguillos">LeoGalleguillos</a>';
        $this->assertSame(
            $html,
            $this->userHtmlHelper->__invoke($userEntity)
        );

        $userEntity->setDisplayName('Leo & Galleguillos');
        $html = '<a href="/users/12345/LeoGalleguillos">Leo &amp; Galleguillos</a>';
        $this->assertSame(
            $html,
            $this->userHtmlHelper->__invoke($userEntity)
        );
    }
}
