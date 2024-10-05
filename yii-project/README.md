# Yii Vue Vite Docker

the goal of this project is to have a dockerized Yii project with a Vite app integrated.

## Dev

Run dev Yii: `php yii serve`
Run dev Yii docker: `docker-compose up`
Docker full cleanup: `docker-compose down && docker system prune -a --volumes -f`

## Tasks

- [x] added vue widget
- [x] run docker (already setup out of the box including hot reload)
- [x] vite app server working
- [x] vite app build working
- [ ] run dockerized vue widget

where to put vite app?

- i created a app folder and put it in there