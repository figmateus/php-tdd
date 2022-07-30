<?php

namespace Code;
class LogTest extends \PHPUnit\Framework\TestCase
{
    protected function assertPreConditions(): void
    {
        $this->assertTrue(class_exists(Log::class));
    }

    public function testIfLogIsMakeSuccessfully()
    {
        $log = new Log();

        $this->assertEquals('Logando dados no sistema:Testando Save de Log no Sistema',
            $log->log('Testando Save de Log no Sistema'));
    }
}