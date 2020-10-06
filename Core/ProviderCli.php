<?php
namespace InstaFreight;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ProviderCli extends Command
{
    protected $commandName = 'provider:create';
    protected $commandDescription = "Create provider boilerplate in providers directory!";

    protected $commandArgumentName = "name";
    protected $commandArgumentDescription = "Enter the name of provider?";

    protected function configure()
    {
        $this
            ->setName($this->commandName)
            ->setDescription($this->commandDescription)
            ->addArgument(
                $this->commandArgumentName,
                InputArgument::OPTIONAL,
                $this->commandArgumentDescription
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument($this->commandArgumentName);

        if ($name) {
            $name = ucfirst($name);
            $providerName = $name."Provider";
            $code = <<<EOD
<?php
// auto-generated FILE using CLI
namespace Providers;
use Curl\Curl;
use InstaFreight\BaseProvider;

class $providerName extends BaseProvider {
    
    // implemented method
    function getQuote(){
        
        // add logic here
        return \$this->error(501, "Provider is not Implemented yet!");
    
    }
    
}
?>
EOD;
            $fileName = dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."providers".DIRECTORY_SEPARATOR.$providerName.".php";
            if (!file_exists($fileName)) {
                //touch($fileName);
                file_put_contents($fileName, $code);
                $text = 'Provider "'.$name.'" is created in providers directory!';
            }else{
                $text = 'Provider "'.$name.'" is already exists in providers directory!';
            }
        } else {
            $text = 'Name is required to generate provider!';
        }

        $output->writeln($text);
    }
}

?>