<?php
/**
 * This file is part of talkart_socket.
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the MIT-LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author    贠王军<yunwangjun@appleoct.com>
 * @copyright 贠王军<yunwangjun@appleoct.com>
 * @link      http://www.yunwangjun.cn/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace TalkArtSocket;
/**
 * SocketEvent.
 */
class SocketEvent{

    public static function publush(){

        echo date('Y-m-d H:i:s'). "\t" . posix_getpid()."\n";
    }

    public static function notice($subject, $event, $data, $exclude){

        foreach ($subject_connnection_map[$subject] as $connection) {
            if ($exclude == $connection) {
                continue;
            }
            $connection->send(json_encode(array(
                'cmd'   => 'publish',
                'event' => $event,
                'data'  => $data
            )));
        }
    }
}