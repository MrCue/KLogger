<?php
require_once(dirname(__FILE__) . '/../src/Klogger.php');

class KLogger_test extends PHPUnit_Framework_TestCase
{
    /**
     * @var KLogger
     */
    private $_logger;

    public function tearDown()
    {
        $path = $this->_logger->getPath();
        //Destroy
        $this->_logger->close();

        //Clean up
        unlink($path);
    }

    public function test_noArguments()
    {
        $logger = KLogger::instance();
        $this->_logger = $logger; //For cleanup

        //Right type of object?
        $this->assertInstanceOf('KLogger', $logger);
        //Check the file exists
        $this->assertTrue(file_exists($logger->getPath()));

    }

    public function test_logEmerg()
    {
        $logger = KLogger::instance(false, KLogger::EMERG, 'KLogger_emerg.log');
        $this->_logger = $logger; //For cleanup

        $this->assertInstanceOf('KLogger', $logger);

        $logger->logEmerg('This is a message');
        $logger->logEmerg('Message with an array', array('Foo' => 'Bar'));

        //Ensure the file exits
        $this->assertTrue(file_exists($logger->getPath()));

        //Check it has two entries
        $contents = file_get_contents($logger->getPath());
        preg_match_all('~EMERG~', $contents, $matches);
        $this->assertEquals(2, count($matches[0]));
    }

    public function test_logAlert()
    {
        $logger = KLogger::instance(false, KLogger::ALERT, 'KLogger_alert.log');
        $this->_logger = $logger; //For cleanup

        $this->assertInstanceOf('KLogger', $logger);

        $logger->logAlert('This is a message');
        $logger->logAlert('Message with an array', array('Foo' => 'Bar'));

        //Ensure the file exits
        $this->assertTrue(file_exists($logger->getPath()));

        //Check it has two entries
        $contents = file_get_contents($logger->getPath());
        preg_match_all('~ALERT~', $contents, $matches);
        $this->assertEquals(2, count($matches[0]));
    }


    public function test_logCrit()
    {
        $logger = KLogger::instance(false, KLogger::CRIT, 'KLogger_crit.log');
        $this->_logger = $logger; //For cleanup

        $this->assertInstanceOf('KLogger', $logger);

        $logger->logCrit('This is a message');
        $logger->logCrit('Message with an array', array('Foo' => 'Bar'));

        //Ensure the file exits
        $this->assertTrue(file_exists($logger->getPath()));

        //Check it has two entries
        $contents = file_get_contents($logger->getPath());
        preg_match_all('~CRIT~', $contents, $matches);
        $this->assertEquals(2, count($matches[0]));
    }

    /*
    public function test_logFatal()
    {
        $logger = KLogger::instance(false, KLogger::FATAL, 'KLogger_fatal.log');
        $this->_logger = $logger; //For cleanup

        $this->assertInstanceOf('KLogger', $logger);

        $logger->logFatal('This is a message');
        $logger->logFatal('Message with an array', array('Foo' => 'Bar'));

        //Ensure the file exits
        $this->assertTrue(file_exists($logger->getPath()));

        //Check it has two entries
        $contents = file_get_contents($logger->getPath());
        preg_match_all('~FATAL~', $contents, $matches);
        $this->assertEquals(2, count($matches[0]));
    }
    */

    public function test_logNotice()
    {
        $logger = KLogger::instance(false, KLogger::NOTICE, 'KLogger_notice.log');
        $this->_logger = $logger; //For cleanup

        $this->assertInstanceOf('KLogger', $logger);

        $logger->logNotice('This is a message');
        $logger->logNotice('Message with an array', array('Foo' => 'Bar'));

        //Ensure the file exits
        $this->assertTrue(file_exists($logger->getPath()));

        //Check it has two entries
        $contents = file_get_contents($logger->getPath());
        preg_match_all('~NOTICE~', $contents, $matches);
        $this->assertEquals(2, count($matches[0]));
    }

    public function test_logInfo()
    {
        $logger = KLogger::instance(false, KLogger::INFO, 'KLogger_info.log');
        $this->_logger = $logger; //For cleanup

        $this->assertInstanceOf('KLogger', $logger);

        $logger->logInfo('This is a message');
        $logger->logInfo('Message with an array', array('Foo' => 'Bar'));

        //Ensure the file exits
        $this->assertTrue(file_exists($logger->getPath()));

        //Check it has two entries
        $contents = file_get_contents($logger->getPath());
        preg_match_all('~INFO~', $contents, $matches);
        $this->assertEquals(2, count($matches[0]));
    }

    public function test_logWarn()
    {
        $logger = KLogger::instance(false, KLogger::WARN, 'KLogger_warn.log');
        $this->_logger = $logger; //For cleanup

        $this->assertInstanceOf('KLogger', $logger);

        $logger->logWarn('This is a message');
        $logger->logWarn('Message with an array', array('Foo' => 'Bar'));

        //Ensure the file exits
        $this->assertTrue(file_exists($logger->getPath()));

        //Check it has two entries
        $contents = file_get_contents($logger->getPath());
        preg_match_all('~WARN~', $contents, $matches);
        $this->assertEquals(2, count($matches[0]));
    }

    public function test_logDebug()
    {
        $logger = KLogger::instance(false, KLogger::DEBUG, 'KLogger_debug.log');
        $this->_logger = $logger; //For cleanup

        $this->assertInstanceOf('KLogger', $logger);

        $logger->logDebug('This is a message');
        $logger->logDebug('Message with an array', array('Foo' => 'Bar'));

        //Ensure the file exits
        $this->assertTrue(file_exists($logger->getPath()));

        //Check it has two entries
        $contents = file_get_contents($logger->getPath());
        preg_match_all('~DEBUG~', $contents, $matches);
        $this->assertEquals(2, count($matches[0]));
    }

    public function test_logError()
    {
        $logger = KLogger::instance(false, KLogger::ERR, 'KLogger_error.log');
        $this->_logger = $logger; //For cleanup

        $this->assertInstanceOf('KLogger', $logger);

        $logger->logError('This is a message');
        $logger->logError('Message with an array', array('Foo' => 'Bar'));

        //Ensure the file exits
        $this->assertTrue(file_exists($logger->getPath()));

        //Check it has two entries
        $contents = file_get_contents($logger->getPath());
        preg_match_all('~ERROR~', $contents, $matches);
        $this->assertEquals(2, count($matches[0]));
    }
}