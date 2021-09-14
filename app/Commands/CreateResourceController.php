<?php
namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Services;

/**
 * Creates a new migration file.
 *
 * @package CodeIgniter\Commands
 */
class CreateResourceController extends BaseCommand
{

    /**
     * The group the command is lumped under
     * when listing commands.
     *
     * @var string
     */
    protected $group = 'Controllers';

    /**
     * The Command's name
     *
     * @var string
     */
    protected $name = 'make:controller';

    /**
     * the Command's short description
     *
     * @var string
     */
    protected $description = 'Creates a new Resource Controller file.';

    /**
     * the Command's usage
     *
     * @var string
     */
    protected $usage = 'make:controller [controller_name]';

    /**
     * the Command's Arguments
     *
     * @var array
     */
    protected $arguments = [
        'controller_name' => 'The Resource Controller file name',
    ];

    /**
     * the Command's Options
     *
     * @var array
     */
    protected $options = [
        
    ];

    /**
     * Creates a new migration file with the current timestamp.
     *
     * @param array $params
     */
    public function run(array $params = [])
    {
        helper('inflector');
        $name = array_shift($params);

        if (empty($name)) {
            $name = CLI::prompt(lang('Controller.nameController'));
        }

        if (empty($name)) {
            CLI::error(lang('Controller.badCreateName'));
            return;
        }
        $homepath = APPPATH;
        $ns = 'App';

        // Always use UTC/GMT so global teams can work together
        // $config   = config('Migrations');
        // $fileName = gmdate($config->timestampFormat) . $name;

        // full path
        $path = $homepath . '/Controllers/' . ucfirst($name) . '.php';

        // Class name should be pascal case now (camel case with upper first letter)
        $name = ucfirst($name);

        $template = <<<EOD
<?php 
namespace $ns\Controllers;
use CodeIgniter\RESTful\ResourceController;
class {name} extends ResourceController {
    protected {modelName} = '\App\Models\PostsModel';
    public function __construct()
    {
        //
    }
    public function index()
    {
        echo "Index";
    }
    public function new()
    {
        echo "new";
    }
    public function create()
    {
        echo "create";
    }
    public function edit({id}=NULL)
    {
        echo "Edit {id}";
    }
    public function show({id}=NULL)
    {
        echo "Show {id}";
    }
    public function update({id}=NULL)
    {
    }
    public function delete({id}=NULL)
    {
        //
    }
}
EOD;
        $template = str_replace('{name}', $name, $template);
        $template = str_replace('{id}', '$id', $template);
        $template = str_replace('{modelName}', '$modelName', $template);

        helper('filesystem');
        if (file_exists($path)) {
            CLI::error("File ${path}.php Already Exists");
            return;
        }
        if (! write_file($path, $template)) {
            CLI::error(lang('Controller.writeError', [$path]));
            return;
        }
       
        CLI::write('Created file: ' . CLI::color(str_replace($homepath, $ns, $path), 'green'));
    }
}
