<?php

/**
 * Посылает пользователю сводку по его сделкам
 */
class SendUserOrderStats
{
    /**
     * Статистика
     *
     * @var array
     */
    protected array $stats = [];

    /**
     * Создаёт экземпляр действия
     *
     * @param User $user Пользователь для отправки письма
     */
    public function __construct(protected User $user)
    {
    }

    /**
     * Выполняет целевое действие
     *
     * @return void
     */
    public function execute(): void
    {
        $this->collectStats();
        $this->send();
    }

    /**
     * Собирает статистику
     *
     * @return void
     */
    protected function collectStats(): void
    {
        // Для примера
        $this->stats = ['stats'=>'12345.06'];
    }

    /**
     * Отправляет письмо
     *
     * @return void
     */
    protected function send(): void
    {
        Mail::to($this->user->email)->send(new OrderStatsMail($this->user, $this->stats));
    }
}
