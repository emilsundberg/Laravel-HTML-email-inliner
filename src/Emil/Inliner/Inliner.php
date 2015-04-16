<?php namespace Emil\Inliner;

use Emil\Inliner\Vendor\Premailer\Premailer as Premailer;

class Inliner {

    protected $options;

    protected $cache_path;

    public function __construct($options, $cache_path)
    {
        $this->options = $options;
        $this->cache_path = $cache_path;
    }

    protected $enabled = true;

    /**
     * Is the inliner enabled
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * Is the inliner disabled?
     *
     * @return bool
     */
    public function isDisabled()
    {
        return ! $this->enabled;
    }

    /**
     * Disable the inliner
     */
    public function disable()
    {
        $this->enabled = false;
    }

    /**
     * Enable the inliner
     */
    public function enable()
    {
        $this->enabled = true;
    }

    /**
     * Set a inline option
     *
     * @param $name
     * @param $value
     * @throws \InvalidArgumentException
     */
    public function setOption($name, $value)
    {
        if (array_key_exists($name, $this->options))
        {
            $this->options[$name] = $value;
        }
        else
        {
            throw new \InvalidArgumentException('The option "' . $name . '" does not exist');
        }
    }

    /**
     * Inline the content
     *
     * @param $content
     * @return string
     */
    public function inline($content)
    {
        $premailer = new Premailer($content, $this->cache_path);

        foreach ($this->options as $name => $value)
        {
            $premailer->setArgument($name, $value);
        }

        return $premailer->getConvertedHtml();
    }

}
