<?php
namespace CodeProject\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
class Project extends Model  implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'owner_id',
        'client_id',
        'name',
        'description',
        'progress',
        'status',
        'due_date'];
    public function owner()
    {
        return $this->belongsTo('\CodeProject\Entities\User', 'owner_id');
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function notes()
    {
        return $this->hasMany(ProjectNote::class)->orderBy('created_at', 'desc');
    }
    public function tasks()
    {
        return $this->hasMany(ProjectTask::class)->orderBy('id', 'desc');;
    }
    public function members()
    {
        return $this->belongsToMany(User::class, 'project_members', 'project_id', 'member_id')->withPivot('id');
    }
    public function files()
    {
        return $this->hasMany(ProjectFile::class);
    }
}