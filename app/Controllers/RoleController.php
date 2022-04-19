<?php

namespace App\Controllers;

class RoleController extends Security_Controller
{
    public function index()
    {
        $res = $this->RoleModel->where(['status' => 1])->findAll();

        if ($res) {
            $res = $this->getUnserializedPermission($res);
            return $this->respond(['message' => 'success', 'data' => $res, 'status' => true], 200);
        } else {
            return $this->respond(['message' => 'Not found', 'status' => false], 404);
        }
    }

    /**
     * This function is used to save new role into the db
     *
     * @return void
     */
    public function save()
    {
        if (!$this->validate([
            'role' => 'required',
        ])) {
            $errors = $this->validator->getErrors();
            return $this->respond(['message' => 'errorslist', 'validation' => $errors, 'status' => false,], 400);
        } else {

            $permissionString =  $this->getPermissioninString();

            $formData = [
                'name' => xss_clean($this->request->getVar('role')) ?? "",
                'role_permission' => $permissionString,
                'type' => "User",
                'created_by' => $this->userid,
            ];
            $res = $this->RoleModel->insert($formData);
            if ($res) {
                return $this->respond(['message' => 'Successfully inserted', 'status' => true], 200);
            } else {
                return $this->respond(['message' => 'Not found', 'status' => false], 404);
            }
        }
    }

    /**
     * This method is used to show role data by id
     *
     * @param int $id
     * @return void
     */
    public function show(int $id = null)
    {
        $data = $this->RoleModel->where(['status' => true, 'r_id' => $id])->find();
        if ($data) {
            $pArray =   unserialize($data[0]['role_permission']);
            $data[0]['role_permission'] = str_split($pArray[0]);
            return $this->respond(['message' => 'Success', 'data' => $data], 200);
        } else {
            return $this->respond(['message' => 'Not found', 'data' => $data], 404);
        }
    }

    /**
     * This method is used to update role data into the db.
     *
     * @return void
     */
    public function update()
    {
        $val = $this->validate([
            'role' => 'required',
        ]);
        if (!$val) {
            $errors = $this->validator->getErrors();
            return $this->respond(['message' => 'errorslist', 'validation' => $errors, 'status' => false,], 400);
        } else {
            $id = $this->request->getVar('rowid');
            $permissionString =  $this->getPermissioninString();
            $formData = [
                'name' => xss_clean($this->request->getVar('role')) ?? "",
                'role_permission' => $permissionString,
                'type' => "User",
                'created_by' => $this->userid,
            ];
            $data = $this->RoleModel->update($id, $formData);
            if ($data) {
                return $this->respond(['message' => 'Successfully updated', 'data' => $data], 202);
            } else {
                return $this->respond(['message' => 'Not found', 'data' => false], 404);
            }
        }
    }

    /**
     * This function is used to delete existing roles and there permission permissions
     *
     * @return void
     */
    public function delete()
    {
        $id = base64_decode($this->request->getVar("id"));
        $formData = ['status' => false, 'deleted_by' => $this->userid];

        $res = $this->RoleModel->update($id, $formData);
        if ($res) {
            return $this->respond(['message' => 'Successfully deleted', 'status' => true], 200);
        } else {
            return $this->respond(['message' => 'Not found', 'status' => false], 404);
        }
    }

    /**
     * This method is used to get permission string array to serialized.
     *
     * @return void
     */
    private function getPermissioninString()
    {
        $resquest =  $this->request->getVar();

        unset($resquest['role']);

        if ($resquest['rowid']) {
            unset($resquest['rowid']);
        }
        $string = false;
        if ($resquest) {
            foreach ($resquest as $key => $item) {
                $string .= $item;
            }
            $arr[] =  $string;
            return  serialize($arr);
        }
        return $string;
    }

    /**
     * This method is used to get unserialized permission data into array form;
     *
     * @param array $res
     * @return void
     */
    private function getUnserializedPermission($res = null)
    {

        foreach ($res as $key1 => $item) {
            $permissionData = unserialize($item['role_permission']);
            $permission = str_split($permissionData[0]);
            $arr = [];
            foreach ($permission as $key => $p) {
                if ($p == "c") {
                    $arr[$key] = "Create";
                } else if ($p == "r") {
                    $arr[$key] = "Read";
                } elseif ($p == "u") {
                    $arr[$key] = "Update";
                } else {
                    $arr[$key] = "Delete";
                }
                $res[$key1]['role_permission'] = $arr;
            }
        }
        return $res;
    }
}
