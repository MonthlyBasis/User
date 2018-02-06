<?php
namespace LeoGalleguillos\User\Model\Table;

use ArrayObject;
use Zend\Db\Adapter\Adapter;

class Photo
{
    /**
     * @var Adapter
     */
    private $adapter;

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @return int
     */
    public function insert(
        $userId,
        $extension,
        $title,
        $description
    ) {
        $sql = '
            INSERT
              INTO `photo` (`user_id`, `extension`, `title`, `description`, `views`, `created`)
            VALUES (?, ?, ?, ?, 0, UTC_TIMESTAMP())
                 ;
        ';
        $parameters = [
            $userId,
            $extension,
            $title,
            $description,
        ];
        return (int) $this->adapter
                          ->query($sql, $parameters)
                          ->getGeneratedValue();
    }

    public function selectCount()
    {
        $sql = '
            SELECT COUNT(*) AS `count`
              FROM `photo`
                 ;
        ';
        $row = $this->adapter->query($sql)->execute()->current();
        return (int) $row['count'];
    }
}
