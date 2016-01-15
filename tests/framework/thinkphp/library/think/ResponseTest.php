<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 大漠 <zhylninc@gmail.com>
// +----------------------------------------------------------------------
namespace think;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-01-14 at 21:32:07.
 */
class ResponseTest extends \PHPUnit_Framework_TestCase
{

    /**
     *
     * @var Response
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Response();
        // 1.
        // restore_error_handler();
        // Warning: Cannot modify header information - headers already sent by (output started at PHPUnit\Util\Printer.php:173)
        // more see in https://www.analysisandsolutions.com/blog/html/writing-phpunit-tests-for-wordpress-plugins-wp-redirect-and-continuing-after-php-errors.htm
        
        // 2.
        // the Symfony used the HeaderMock.php
        
        // 3.
        // not run the eclipse will held, and travis-ci.org Searching for coverage reports
        // **> Python coverage not found
        // **> No coverage report found.
        // add the
        // /**
        // * @runInSeparateProcess
        // */
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {}

    /**
     * @covers think\Response::send
     * @todo Implement testSend().
     */
    public function testSend()
    {
//         $dataArr = array();
//         $dataArr["key"] = "value";
//         $dataArr->key = "val";
        
//         $result = \Think\Response::send($dataArr, "", true);
//         $this->assertArrayHasKey("key", $result);
        
//         $result = \Think\Response::send($dataArr, "json", true);
//         $this->assertEquals('{"key":"value"}', $result);
        
//         $handler = "callback";
//         $_GET[Config::get('var_jsonp_handler')] = $handler;
//         $result = \Think\Response::send($dataArr, "jsonp", true);
//         $this->assertEquals('callback({"key":"value"});', $result);
        
//         \Think\Response::tramsform(function () {
            
//             return "callbackreturndata";
//         });
        
//         $result = \Think\Response::send($dataArr, "", true);
//         $this->assertEquals("callbackreturndata", $result);
    }

    /**
     * @covers think\Response::tramsform
     * @todo Implement testTramsform().
     */
    public function testTramsform()
    {
//         \Think\Response::tramsform(function () {
            
//             return "callbackreturndata";
//         });
        
//         $result = \Think\Response::send($dataArr, "", true);
//         $this->assertEquals("callbackreturndata", $result);
    }

    /**
     * @covers think\Response::type
     * @todo Implement testType().
     */
    public function testType()
    {
        $type = "json";
        \Think\Response::type($type);
        
        $result = \Think\Response::type();
        $this->assertEquals($type, $result);
    }

    /**
     * @covers think\Response::data
     * @todo Implement testData().
     */
    public function testData()
    {
        $data = "data";
        \Think\Response::data($data);
        \Think\Response::data(null);
    }

    /**
     * @covers think\Response::isExit
     * @todo Implement testIsExit().
     */
    public function testIsExit()
    {
        $isExit = true;
        \Think\Response::isExit($isExit);
        
        $result = \Think\Response::isExit();
        $this->assertTrue($isExit, $result);
    }

    /**
     * @covers think\Response::result
     * @todo Implement testResult().
     */
    public function testResult()
    {
        $data = "data";
        $code = "1001";
        $msg = "the msg";
        $type = "json";
        $result = \Think\Response::result($data, $code, $msg, $type);
        
        $this->assertEquals($code, $result["code"]);
        $this->assertEquals($msg, $result["msg"]);
        $this->assertEquals($data, $result["data"]);
        $this->assertEquals($_SERVER['REQUEST_TIME_FLOAT'], $result["time"]);
        $this->assertEquals($type, \Think\Response::type());
    }

    /**
     * @covers think\Response::success
     * @todo Implement testSuccess().
     */
    public function testSuccess()
    {
        // round 1
        $msg = 1001;
        $data = "data";
        
        $url = "www.HTTP_REFERER.com";
        $_SERVER["HTTP_REFERER"] = $url;
        Config::set('default_return_type', "json");
        
        $result = \Think\Response::success($msg, $data);
        
        $this->assertEquals($msg, $result["code"]);
        
        $this->assertEquals($data, $result["data"]);
        $this->assertEquals($url, $result["url"]);
        $this->assertEquals("json", \Think\Response::type());
        $this->assertEquals(3, $result["wait"]);
        
        // round 2
        $msg = "the msg";
        $url = "www.thinkphptestsucess.com";
        
        $result = \Think\Response::success($msg, $data, $url);
        
        $this->assertEquals($msg, $result["msg"]);
        $this->assertEquals($url, $result["url"]);
        
        // round 3
        $this->setExpectedException('\think\Exception');
        // FIXME 静态方法mock
        // $oMockView = $this->getMockBuilder('\think\View')->setMethods(array(
        // 'fetch'
        // ))->getMock();
        
        // $oMockView->expects($this->any())->method('fetch')->will($this->returnValue('content'));
        
        Config::set('default_return_type', "html");
        $result = \Think\Response::success($msg, $data, $url);
        
        // FIXME 静态方法mock
        // $this->assertEquals('content', $result);
    }

    /**
     * @covers think\Response::error
     * @todo Implement testError().
     */
    public function testError()
    {
        // round 1
        $msg = 1001;
        $data = "data";
        
        Config::set('default_return_type', "json");
        
        $result = \Think\Response::error($msg, $data);
        
        $this->assertEquals($msg, $result["code"]);
        $this->assertEquals($data, $result["data"]);
        $this->assertEquals('javascript:history.back(-1);', $result["url"]);
        $this->assertEquals("json", \Think\Response::type());
        $this->assertEquals(3, $result["wait"]);
        
        // round 2
        $msg = "the msg";
        $url = "www.thinkphptesterror.com";
        
        $result = \Think\Response::error($msg, $data, $url);
        
        $this->assertEquals($msg, $result["msg"]);
        $this->assertEquals($url, $result["url"]);
        
        // round 3
        $this->setExpectedException('\think\Exception');
        // FIXME 静态方法mock
        // $oMockView = $this->getMockBuilder('\think\View')->setMethods(array(
        // 'fetch'
        // ))->getMock();
        
        // $oMockView->expects($this->any())->method('fetch')->will($this->returnValue('content'));
        
        Config::set('default_return_type', "html");
        $result = \Think\Response::error($msg, $data, $url);
        
        // FIXME 静态方法mock
        // $this->assertEquals('content', $result);
    }

    /**
     * 
     * @covers think\Response::redirect
     * @todo Implement testRedirect().
     */
    public function testRedirect()
    {
        $url = "http://www.testredirect.com";
        $params = array();
        $params[] = 301;
        
        // FIXME 静态方法mock Url::build
        // echo "\r\n" . json_encode(xdebug_get_headers()) . "\r\n";
        // \Think\Response::redirect($url, $params);
        
        // $this->assertContains('Location: ' . $url, xdebug_get_headers());
    }

    /**
     * 
     * @covers think\Response::header
     * @todo Implement testHeader().
     */
    public function testHeader()
    {
        $name = "Location";
        $url = "http://www.testheader.com/";
        // \Think\Response::header($name, $url);
        // $this->assertContains($name . ': ' . $url, xdebug_get_headers());
    }

    /**
     *      * @covers think\Response::sendHttpStatus
     * @todo Implement testSendHttpStatus().
     */
    public function testSendHttpStatus()
    {
        // \Think\Response::sendHttpStatus(416);
        
        // $this->assertContains('HTTP/1.1 ' . ': ' . $status, xdebug_get_headers());
        // $this->assertContains('Status:' . ': ' . $status, xdebug_get_headers());
    }
}
