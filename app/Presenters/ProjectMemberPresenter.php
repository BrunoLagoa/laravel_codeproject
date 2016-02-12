<?php

namespace CodeProject\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProjectPresenter
 *
 * @package namespace CodeProject\Presenters;
 */
class ProjectMemberTransformer extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProjectMemberTransformer();
    }
}