<?php

use Zizaco\Entrust\EntrustRole;
use BigElephant\Presenter\PresentableInterface;

class Role extends EntrustRole implements PresentableInterface
{
    // Available permissions
    protected static $availablePermissions = array(
        1 => 'manage_posts',
        2 => 'manage_pages',
        3 => 'manage_users'
    );

    /**
     * Same presenter as the user model.
     * @return BigElephant\Presenter\BigElephant\Presenter\Presenter|UserPresenter
     */
    public function getPresenter()
    {
        return new UserPresenter($this);
    }

    /**
     * Convert from input array to savable array.
     * @param $permissions
     * @return array
     */
    public function preparePermissionsForSave( $permissions )
    {
        $availablePermissions = $this->getAvailablePermissions();
        $preparedPermissions = array();
        foreach( $permissions as $permission => $value )
        {
            // If checkbox is selected
            if( $value == '1' )
            {
                // If permission exists
                if( array_key_exists( $permission, $availablePermissions ) )
                {
                    // Add name of permission to array
                    $preparedPermissions[(int)$permission] = $availablePermissions[(int)$permission];
                }
            }
        }
        return $preparedPermissions;
    }

    /**
     * Convert set permissions to full permission array.
     * @param $permissions
     * @return array
     */
    public function preparePermissionsForDisplay( $permissions )
    {
        $availablePermissions = $this->getAvailablePermissions();
        $preparedPermissions = array();
        foreach( $permissions as $permission)
        {
            if( in_array( $permission, $availablePermissions ) && $id = array_search($permission, $availablePermissions) )
            {
                // Add name of permission to array
                $preparedPermissions[$id] = $availablePermissions[$id];
            }
        }
        return $preparedPermissions;
    }

    /**
     * @return array
     */
    public static function getAvailablePermissions()
    {
        return self::$availablePermissions;
    }

}