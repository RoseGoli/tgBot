<?php

namespace tgBot\TL\Methods;

use tgBot\Telegram;
use tgBot\TL\Types\InlineQueryResult;
use tgBot\TL\Types\SentWebAppMessage;

/**
 * @class AnswerWebAppQuery
 * @description Use this method to set the result of an interaction with a Web App and send a corresponding message on behalf of the user to the chat from which the query originated. On success, a SentWebAppMessage object is returned.
 *
 * @property string $web_app_query_id Unique identifier for the query to be answered
 * @property InlineQueryResult $result A JSON-serialized object describing the message to be sent
 *
 *
 * @see https://api.telegram.org/bots/api#answerwebappquery
 */
class AnswerWebAppQuery extends MethodDefinition implements MethodDefinitionInterface
{
    protected string $castsTo = 'SentWebAppMessage';

    /**
     * @var mixed $params The value that are taken in the constructor method as method parameters.
     */
    public function __construct(...$params)
    {
        $this->params = $params;
    }

    /**
     * @return SentWebAppMessage
     */
    public function __invoke(Telegram $telegram)
    {
        return $this->call($telegram);
    }
}