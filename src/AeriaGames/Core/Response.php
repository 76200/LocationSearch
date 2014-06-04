<?php

namespace AeriaGames\Core;

/**
 * Class Response
 */
class Response
{
    protected $data;
    protected $status;
    protected $contentType;

    const CONTENT_TYPE_HTML = 'text/html';
    const CONTENT_TYPE_JSON = 'application/json';

    const HTTP_OK = 200;

    /**
     * Constructor.
     *
     * @param $data
     * @param int $status
     * @param string $contentType
     */
    function __construct($data, $status = self::HTTP_OK, $contentType = self::CONTENT_TYPE_HTML)
    {
        $this->data = $data;
        $this->status = $status;
        $this->contentType = $contentType;
    }

    /**
     * @return string
     */
    function __toString()
    {
        return $this->data;
    }

    /**
     * Sets headers of the response
     *
     * @return $this
     */
    private function setHeaders()
    {
        header(sprintf('Content-type: %s', $this->contentType)); // Set response Content-type
        header(sprintf('HTTP/1.0 %d', $this->status));           // Set response status code

        return $this;
    }

    /**
     * Echoes content of the response
     */
    public function send()
    {
        echo $this->setHeaders();
    }
}
