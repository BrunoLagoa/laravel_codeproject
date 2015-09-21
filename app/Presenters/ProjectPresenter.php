<?php

namespace CodeProject\Presenters;

use CodeProject\Transformers\ProjectTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProjectPresenter
 *
 * @package namespace CodeProject\Presenters;
 */
class ProjectPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProjectTransformer();
    }
}
