<?php

namespace CodeProject\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;
use CodeProject\Transformers\UserTransformer;

/**
 * Class UserPresenter
 *
 * @package namespace CodeProject\Presenters;
 */
class UserPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UserTransformer();
    }
}