<?php
namespace LeoGalleguillos\User\Model\Table\User;

use Zend\Db\Adapter\Adapter;

class LoginDateTime
{
    /**
     * @var Adapter
     */
    private $adapter;

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function updateSetToNowWhereUserId(int $userId)
    {
        $sql = '
            UPDATE `user`
               SET `user`.`login_datetime` = UTC_TIMESTAMP()
             WHERE `user`.`user_id` = :userId
                 ;
        ';
        $parameters = [
            'userId'        => $userId,
        ];
        return (bool) $this->adapter
                           ->query($sql)
                           ->execute($parameters)
                           ->getAffectedRows();
    }
}
