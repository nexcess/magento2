<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Integration\Test\Constraint;

use Magento\Integration\Test\Page\Adminhtml\IntegrationIndex;
use Magento\Mtf\Constraint\AbstractConstraint;

/**
 * Class AssertIncorrectUserPassword
 * Assert that an error message is displayed in case current user password is incorrect.
 */
class AssertIncorrectUserPassword extends AbstractConstraint
{
    const ERROR_MESSAGE = "You have entered an invalid password for current user.";

    /**
     * Assert that an error message is displayed on the Integration page in case current user password is incorrect.
     *
     * @param IntegrationIndex $integrationIndexPage
     * @return void
     */
    public function processAssert(
        IntegrationIndex $integrationIndexPage
    ) {
        $actualMessage = $integrationIndexPage->getMessagesBlock()->getErrorMessage();
        \PHPUnit_Framework_Assert::assertEquals(
            self::ERROR_MESSAGE,
            $actualMessage,
            'Wrong error message is displayed.'
            . "\nExpected: " . self::ERROR_MESSAGE
            . "\nActual: " . $actualMessage
        );
    }

    /**
     * Returns a string representation of successful assertion
     *
     * @return string
     */
    public function toString()
    {
        return 'Incorrect password message is present and correct.';
    }
}
