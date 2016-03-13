<?php

namespace Http;

class Response
{
    protected $_content;
    protected $_statusCode;
    protected $_statusMessage;

    public function __construct($content, $statusCode = 200, $statusMessage = 'success')
    {
        $this->_content       = $content;
        $this->_statusCode    = $statusCode;
        $this->_statusMessage = $statusMessage;

        echo $this->__tostring();
        exit;
    }

    public function __tostring()
    {
        $response = [
            'data' => $this->_content,
            'statusCode' => $this->_statusCode,
            'statusMessage' => $this->_statusMessage,
        ];

        return json_encode($response);
    }
}
