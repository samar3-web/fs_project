<?php

namespace App\Controller\Admin;
use App\Entity\User;
use App\Entity\Contact;
use App\Entity\Annonces;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Fs Project');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('User', 'fa fa-home', User::class);
        yield MenuItem::linkToCrud('Contact', 'fa fa-home', Contact::class);
        yield MenuItem::linkToCrud('Annonces', 'fa fa-home', Annonces::class);


    }
}
