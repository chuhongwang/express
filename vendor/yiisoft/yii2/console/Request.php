<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yii\console;

/**
 * The console Request represents the environment information for a console application.
 *
 * It is a wrapper for the PHP `$_SERVER` variable which holds information about the
 * currently running PHP script and the command line arguments given to it.
 *
 * @property array $params The command line arguments. It does not include the entry script name.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Request extends \yii\base\Request
{
    private $_params;
    public $url;


    /**
     * Returns the command line arguments.
     * @return array the command line arguments. It does not include the entry script name.
     */
    public function getParams()
    {
        if ($this->_params === null) {
            if (isset($_SERVER['argv'])) {
                $this->_params = $_SERVER['argv'];
                array_shift($this->_params);
            } else {
                $this->_params = [];
            }
        }

        return $this->_params;
    }

    /**
     * Sets the command line arguments.
     * @param array $params the command line arguments
     */
    public function setParams($params)
    {
        $this->_params = $params;
    }

    /**
     * Resolves the current request into a route and the associated parameters.
     * @return array the first element is the route, and the second is the associated parameters.
     * @throws Exception when parameter is wrong and can not be resolved
     */
    public function resolve()
    {
        $rawParams = $this->getParams();
        $endOfOptionsFound = false;
        if (isset($rawParams[0])) {
            $route = array_shift($rawParams);

            if ($route === '--') {
                $endOfOptionsFound = true;
                $route = array_shift($rawParams);
            }
        } else {
            $route = '';
        }

        $params = [];
        foreach ($rawParams as $param) {
            if ($endOfOptionsFound) {
                $params[] = $param;
            } elseif ($param === '--') {
                $endOfOptionsFound = true;
            } elseif (preg_match('/^--([\w-]+)(?:=(.*))?$/', $param, $matches)) {
                $name = $matches[1];
                if (is_numeric(substr($name, 0, 1))) {
                    throw new Exception('Parameter "' . $name . '" is not valid');
                }

                if ($name !== Application::OPTION_APPCONFIG) {
                    $params[$name] = isset($matches[2]) ? $matches[2] : true;
                }
            } elseif (preg_match('/^-([\w-]+)(?:=(.*))?$/', $param, $matches)) {
                $name = $matches[1];
                if (is_numeric($name)) {
                    $params[] = $param;
                } else {
                    $params['_aliases'][$name] = isset($matches[2]) ? $matches[2] : true;
                }
            } else {
                $params[] = $param;
            }
        }

        return [$route, $params];
    }

    private $_queryParams;
    /**
     * Sets the request [[queryString]] parameters.
     * @param array $values the request query parameters (name-value pairs)
     * @see getQueryParam()
     * @see getQueryParams()
     */
    public function setQueryParams($values)
    {
        $this->_queryParams = $values;
    }

    ///----------------------为辅助定时任务获取db添加--heaboy-↓
    /**
     * Returns GET parameter with a given name. If name isn't specified, returns an array of all GET parameters.
     *
     * @param string $name the parameter name
     * @param mixed $defaultValue the default parameter value if the parameter does not exist.
     * @return array|mixed
     */
    public function get($name = null, $defaultValue = null)
    {
        if ($name === null) {
            return null;
        }

        return $this->getQueryParam($name, $defaultValue);
    }
    /**
     * Returns the named GET parameter value.
     * If the GET parameter does not exist, the second parameter passed to this method will be returned.
     * @param string $name the GET parameter name.
     * @param mixed $defaultValue the default parameter value if the GET parameter does not exist.
     * @return mixed the GET parameter value
     * @see getBodyParam()
     */
    public function getQueryParam($name, $defaultValue = null)
    {
        $params = $this->getQueryParams();

        return isset($params[$name]) ? $params[$name] : $defaultValue;
    }
    public function getQueryParams()
    {
        return $this->_queryParams;
    }
    public static function post()
    {

    }
    ///----------------------为辅助定时任务获取db添加--heaboy--↑
}
