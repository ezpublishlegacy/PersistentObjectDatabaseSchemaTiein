<?php
/**
 * File containing the Debugger class.
 *
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 * 
 *   http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 *
 */
/**
 * Debugger
 *
 * @property string $sessionId
 */
class Debugger implements ezcPersistentObject
{
    /**
     * Properties.
     * 
     * @var array(string=>mixed)
     */
    protected $properties = array();

    /**
     * Creates a new Debugger
     * 
     * @return void
     */
    public function __construct()
    {
		
	    $this->properties['sessionId'] = null;
    }

    /**
     * Set properties after reading an object from the database. 
     * 
     * @param array(string=>mixed) $properties 
     * @return void
     *
     * @access private
     */
    public function setState( array $properties )
    {
        foreach ( $properties as $name => $value )
        {
            $this->properties[$name] = $value;
        }
    }

    /**
     * Returns the property values to store an object to the database.
     * 
     * @return array(string=>mixed)
     *
     * @access private
     */
    public function getState()
    {
        return $this->properties;
    }

    /**
     * Overloading to set properties.
     *
	 * @throws ezcBaseValueException
	 *         if the property value to set does no conform to type constraints.
	 * @throws ezcBasePropertyNotFoundException
	 *         if the desired property does not exist.
     * 
     * @param string $propertyName 
     * @param mixed $propertyValue 
     * @return void
	 *
	 * @ignore
     */
    public function __set( $propertyName, $propertyValue )
    {
        switch ( $propertyName )
        {
            
			case 'sessionId':
				if ( !is_string( $propertyValue ) )
				{
					throw new ezcBaseValueException(
						$propertyName,
						$propertyValue,
						'string'
					);
				}
			break;

            default:
                throw new ezcBasePropertyNotFoundException(
					$propertyName,
					$propertyValue
				);
        }
        $this->properties[$propertyName] = $propertyValue;
    }

    /**
     * Overloading to get properties.
     * 
	 * @throws ezcBasePropertyNotFoundException
	 *         if the desired property does not exist.
	 *
     * @param string $propertyName 
     * @return void
	 *
	 * @ignore
     */
    public function __get( $propertyName )
    {
        if ( $this->__isset( $propertyName ) )
        {
            return $this->properties[$propertyName];
        }
        throw new ezcBasePropertyNotFoundException( $propertyName );
    }

    /**
     * Overloading for property isset() checks.
     * 
     * @param string $propertyName 
     * @return bool
	 *
	 * @ignore
     */
    public function __isset( $propertyName )
    {
        return array_key_exists( $propertyName, $this->properties );
    }
}

?>
