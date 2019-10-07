<?php

namespace App\Command;

use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Validator\Constraints\NotBlank;

class TestCommand extends Command
{
    protected static $defaultName = 'app:test';

    /** @var ContainerInterface  */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct();

        $this->container = $container;
    }

    protected function configure()
    {
        // ...
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $cmd = [
            'id' => 'd',
            'amount' => 100,
            'name' => '111-11-1'
        ];

        $builder = $this->container->get('form.factory')->createBuilder(MyForm::class, new Report(), [
            'csrf_protection' => false,
            'validation_groups' => ['admin']
        ]);

        $builder->addEventListener(FormEvents::SUBMIT, function (FormEvent $event) {
            /** @var Report $data */
            $data = $event->getData();

            $data->setName(str_replace('-', '', $data->getName()));

            $event->setData($data);
        });

        $form = $builder->getForm();

        if ($form->submit($cmd) && $form->isValid()) {
            dd($form->getData());
        }

        dump($form->getErrors(true)->__toString());
    }
}

class Report
{
    protected $id;
    protected $amount;
    protected $name;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }
}

class MyForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', IntegerType::class, [
                'constraints' => [
                    new NotBlank([
                        'groups' => ['user', 'admin'],
                        'message' => 'Username ห้ามว่าง'
                    ])
                ],
            ])
            ->add('amount', NumberType::class, [
                'constraints' => [
                    new NotBlank([
                        'groups' => ['user']
                    ])
                ],
            ])
            ->add('name', TextType::class);
    }
}