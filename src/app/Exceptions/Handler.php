<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

use Exception;

use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;



class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
	
	 /**
   * Render an exception into an HTTP response.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Exception  $exception
   * @return \Illuminate\Http\Response
   */
   /*
  public function render($request, Exception $exception)
  {
    if($exception instanceof ValidationException){
      return parent::render($request, $exception);
    }
    if($exception instanceof ModelNotFoundException){
      return response()->json(['message' => 'Nenhum resultado encontrado'],404);
    }
    if($exception instanceof MethodNotAllowedHttpException){
      return response()->json(['message' => 'Sem permissão para acessar o metódo'],405);
    }
    if($exception instanceof NotFoundHttpException){
      $code = ( (100 <= $exception->getStatusCode()) && ($exception->getStatusCode() < 600) ? $exception->getStatusCode() : 500 );
    } else {
      $code = ( (100 <= $exception->getCode()) && ($exception->getCode() < 600) ? $exception->getCode() : 500 );
    }

    $message = ['message' => $exception->getMessage()];
    if(!config('app.debug') && $code === 500){
      $message['message'] = __('messages.error_exception');
    }
    if(config('app.debug')){
      $message['trace'] = $exception->getTrace();
    }
    return response()->json($message,$code);
  }*/
}
