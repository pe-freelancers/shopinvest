<?php
namespace App\Common;

interface StandardCode {
    const UNKNOWN_ERROR = 0000;
    /* ------- Request ------------------*/
    const INVALID_PARAMS = 1001;
    const HTTP_OK = 200;
    const HTTP_BAD_REQUEST = 400;
    const ERROR_CODE_UNAUTHORIZED = 401;
    const HTTP_ERROR_CODE_UNAUTHORIZED = 401;
    const HTTP_SERVER_ERROR = 500;
}


interface StandardErrorCode {
    const NOT_FOUND = 1000;

}
trait ApiResponse
{
    protected function returnSuccess($data = null)
    {
        $return = ['success' => 1];
        if(!empty($data)){
            $return['data'] = $data;
        }
        return response()->json($return);
    }

    public function returnError($error_code, $mess = null, $return_code = 400){
        if(empty($mess)){
            $mess = [__('messages.error_mess.server_error')];
        } else if ( !is_array($mess)){
            $mess = [$mess];
        }

        return response()->json([
            'success' => 0,
            'error_code' => $error_code,
            'msg' => $mess,
        ], $return_code);
    }

    protected function returnBadRequestError($mess = null)
    {
        if(empty($mess)){
            $mess = [__('messages.error_mess.bad_request')];
        } elseif (!is_array($mess)){
            $mess = [$mess];
        }

        return $this->returnError(StandardCode::INVALID_PARAMS, $mess, StandardCode::HTTP_BAD_REQUEST);
    }

    protected function returnValidationError($field_message_map)
    {
        throw \Illuminate\Validation\ValidationException::withMessages($field_message_map);
    }
}
