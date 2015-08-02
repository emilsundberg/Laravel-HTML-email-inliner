<?php

namespace Emil\Inliner;

class CssInlinerPlugin implements \Swift_Events_SendListener
{
    protected $inliner;

    public function __construct(Inliner $inliner)
    {
        $this->inliner = $inliner;
    }

    /**
     * @param \Swift_Events_SendEvent $evt
     */
    public function beforeSendPerformed(\Swift_Events_SendEvent $evt)
    {
        if ($this->inliner->isDisabled()) {
            return;
        }

        $message = $evt->getMessage();

        if ($message->getContentType() === 'text/html' ||
            ($message->getContentType() === 'multipart/alternative' && $message->getBody())) {
            $message->setBody($this->inliner->inline($message->getBody()));
        }

        foreach ($message->getChildren() as $part) {
            if (strpos($part->getContentType(), 'text/html') === 0) {
                $message->setBody($this->inliner->inline($part->getBody()));
            }
        }
    }

    /**
     * Do nothing.
     *
     * @param \Swift_Events_SendEvent $evt
     */
    public function sendPerformed(\Swift_Events_SendEvent $evt)
    {
        // Do Nothing
    }
}
