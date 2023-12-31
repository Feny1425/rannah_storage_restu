<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\BaseModel
 *
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel query()
 */
	class BaseModel extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Branch
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $manager_id
 * @property string $name
 * @property string $location
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\BranchItem> $branch_items
 * @property-read int|null $branch_items_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\BranchMeal> $branch_meals
 * @property-read int|null $branch_meals_count
 * @property-read \App\Models\User|null $manager
 * @method static \Illuminate\Database\Eloquent\Builder|Branch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Branch newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Branch query()
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereManagerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereUpdatedAt($value)
 */
	class Branch extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BranchItem
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $branch_id
 * @property int $item_id
 * @property int $quantity
 * @property-read \App\Models\Branch $branch
 * @property-read \App\Models\Item $item
 * @method static \Illuminate\Database\Eloquent\Builder|BranchItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BranchItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BranchItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|BranchItem whereBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BranchItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BranchItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BranchItem whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BranchItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BranchItem whereUpdatedAt($value)
 */
	class BranchItem extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BranchMeal
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $branch_id
 * @property int $meal_id
 * @property int $quantity
 * @property-read \App\Models\Branch $branch
 * @property-read \App\Models\Meal $meal
 * @method static \Illuminate\Database\Eloquent\Builder|BranchMeal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BranchMeal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BranchMeal query()
 * @method static \Illuminate\Database\Eloquent\Builder|BranchMeal whereBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BranchMeal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BranchMeal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BranchMeal whereMealId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BranchMeal whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BranchMeal whereUpdatedAt($value)
 */
	class BranchMeal extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ImportExportRecord
 *
 * @property int $id
 * @property int $record_id
 * @property int $import_branch_id
 * @property int $export_branch_id
 * @property int $quantity
 * @property string $status
 * @property string|null $status_updated_at
 * @property int|null $status_updated_by
 * @property string|null $status_updated_reason
 * @method static \Illuminate\Database\Eloquent\Builder|ImportExportRecord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ImportExportRecord newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ImportExportRecord query()
 * @method static \Illuminate\Database\Eloquent\Builder|ImportExportRecord whereExportBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImportExportRecord whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImportExportRecord whereImportBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImportExportRecord whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImportExportRecord whereRecordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImportExportRecord whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImportExportRecord whereStatusUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImportExportRecord whereStatusUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImportExportRecord whereStatusUpdatedReason($value)
 */
	class ImportExportRecord extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Item
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string $name_en
 * @property string $unit
 * @property string $unit_en
 * @property \App\Enums\Food $type
 * @method static \Illuminate\Database\Eloquent\Builder|Item newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Item newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Item query()
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereUnitEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Item whereUpdatedAt($value)
 */
	class Item extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Meal
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string $unit
 * @property string $name_en
 * @property string $unit_en
 * @property int $batch_size
 * @property int $expiry_duration
 * @property-read mixed $name_unit
 * @property-read mixed $name_unit_en
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\MealItem> $meal_items
 * @property-read int|null $meal_items_count
 * @method static \Illuminate\Database\Eloquent\Builder|Meal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Meal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Meal query()
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereBatchSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereExpiryDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereUnitEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereUpdatedAt($value)
 */
	class Meal extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MealItem
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $meal_id
 * @property int $item_id
 * @property int $quantity
 * @property-read \App\Models\Item $item
 * @property-read \App\Models\Meal $meal
 * @method static \Illuminate\Database\Eloquent\Builder|MealItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MealItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MealItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|MealItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MealItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MealItem whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MealItem whereMealId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MealItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MealItem whereUpdatedAt($value)
 */
	class MealItem extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProducedMealRecord
 *
 * @property int $id
 * @property int $record_id
 * @property int $meal_id
 * @property-read \App\Models\Record|null $record
 * @method static \Illuminate\Database\Eloquent\Builder|ProducedMealRecord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProducedMealRecord newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProducedMealRecord query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProducedMealRecord whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProducedMealRecord whereMealId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProducedMealRecord whereRecordId($value)
 */
	class ProducedMealRecord extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\QuantityEditRecord
 *
 * @property int $id
 * @property int $record_id
 * @property int $old_quantity
 * @property int $new_quantity
 * @property-read \App\Models\Record|null $record
 * @method static \Illuminate\Database\Eloquent\Builder|QuantityEditRecord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuantityEditRecord newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QuantityEditRecord query()
 * @method static \Illuminate\Database\Eloquent\Builder|QuantityEditRecord whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuantityEditRecord whereNewQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuantityEditRecord whereOldQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QuantityEditRecord whereRecordId($value)
 */
	class QuantityEditRecord extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Record
 *
 * @property-read Recordable $recordable
 * @property-read Stockable $stockable
 * @property int $id
 * @property string $created_at
 * @property int $user_id
 * @property int $branch_id
 * @property int|null $recordable_id
 * @property string|null $recordable_type
 * @property int|null $stockable_id
 * @property string|null $stockable_type
 * @property int|null $stockable_quantity
 * @property-read \App\Models\Branch $branch
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Record newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Record newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Record query()
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereRecordableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereRecordableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereStockableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereStockableQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereStockableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereUserId($value)
 */
	class Record extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Recordable
 *
 * @property-read \App\Models\Record|null $record
 * @method static \Illuminate\Database\Eloquent\Builder|Recordable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Recordable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Recordable query()
 */
	class Recordable extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Stockable
 *
 * @property int $quantity
 * @method static \Illuminate\Database\Eloquent\Builder|Stockable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stockable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stockable query()
 */
	class Stockable extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Branch> $branches
 * @property-read int|null $branches_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutRole($roles, $guard = null)
 */
	class User extends \Eloquent implements \Filament\Models\Contracts\FilamentUser {}
}

