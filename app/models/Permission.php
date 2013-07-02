<?php

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission {

    /**
     * Provide an array of strings that map to valid permissions
     *
     * @param  array $permissions Available persmissions.
     * @return array Prepared permissions.
     */
    public function preparePermissionsForDisplay($permissions)
    {
        // Get all the available permissions
        $availablePermissions = $this->all()->toArray();

        foreach($permissions as &$permission) {
            array_walk($availablePermissions, function(&$value) use(&$permission){
                if($permission->name == $value['name']) {
                    $value['checked'] = true;
                }
            });
        }
        return $availablePermissions;
    }

    /**
     * Prepares permission input array for save
     *
     * @param  array $permissions Selected permissions.
     *
     * @return array Prepared permissions.
     */
    public function preparePermissionsForSave( $permissions )
    {
        $availablePermissions = $this->all()->toArray();
        $preparedPermissions = array();
        foreach( $permissions as $permission => $value )
        {
            // If checkbox is selected
            if( $value == '1' )
            {
                // If permission exists
                array_walk($availablePermissions, function(&$value) use($permission, &$preparedPermissions){
                    if($permission == (int)$value['id']) {
                        $preparedPermissions[] = $permission;
                    }
                });
            }
        }
        return $preparedPermissions;
    }
}