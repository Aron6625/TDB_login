/*==============================================================*/
/* DBMS name:      PostgreSQL 8                                 */
/* Created on:     29/03/2023 09:48:43 p. m.                    */
/*==============================================================*/


drop index if exists FUNCION_RANGO_PK;

drop table if exists FUNCION;

drop index if exists ______FK;

drop index if exists ____FK;

drop index if exists FUNCIO_IU_PK;

drop table if exists FUNCION_IU;

drop index if exists INTERFACE_PK;

drop table if exists IU;

drop index if exists ROL_PK;

drop table if exists ROL;

drop index if exists ___FK;

drop index if exists __FK;

drop index if exists ROL_FUNCION_PK;

drop table if exists ROL_FUNCION;

drop index if exists TIENE_FK;

drop index if exists SESION_PK;

drop table if exists SESION;

drop index if exists USER_PK;

drop table if exists "user";

drop index if exists TIENE_UN_FK;

drop index if exists RELATIONSHIP_1_FK;

drop index if exists USERN_ROL_PK;

drop table if exists USER_ROL;

/*==============================================================*/
/* Table: FUNCION                                               */
/*==============================================================*/
create table FUNCION (
   ID_FUNCION           SERIAL               not null,
   NOMBRE_FUNCION       VARCHAR(100)         not null,
   constraint PK_FUNCION primary key (ID_FUNCION)
);

/*==============================================================*/
/* Index: FUNCION_RANGO_PK                                      */
/*==============================================================*/
create unique index FUNCION_RANGO_PK on FUNCION (
ID_FUNCION
);

/*==============================================================*/
/* Table: FUNCION_IU                                            */
/*==============================================================*/
create table FUNCION_IU (
   ID_FUNCION           INT4                 not null,
   ID_IU                INT4                 not null,
   constraint PK_FUNCION_IU primary key (ID_FUNCION, ID_IU)
);
Drop table funcion_iu
/*==============================================================*/
/* Index: FUNCIO_IU_PK                                          */
/*==============================================================*/
create unique index FUNCIO_IU_PK on FUNCION_IU (
ID_FUNCION,
ID_IU
);

/*==============================================================*/
/* Index: ____FK                                                */
/*==============================================================*/
create  index ____FK on FUNCION_IU (
ID_FUNCION
);

/*==============================================================*/
/* Index: ______FK                                              */
/*==============================================================*/
create  index ______FK on FUNCION_IU (
ID_IU
);

/*==============================================================*/
/* Table: IU                                                    */
/*==============================================================*/
create table IU (
   ID_IU                SERIAL               not null,
   NOMBRE_IU            VARCHAR(100)         not null,
   constraint PK_IU primary key (ID_IU)
);

/*==============================================================*/
/* Index: INTERFACE_PK                                          */
/*==============================================================*/
create unique index INTERFACE_PK on IU (
ID_IU
);

/*==============================================================*/
/* Table: ROL                                                   */
/*==============================================================*/
create table ROL (
   ID_ROL               SERIAL               not null,
   NOMBRE_ROL           VARCHAR(100)         null,
   constraint PK_ROL primary key (ID_ROL)
);

/*==============================================================*/
/* Index: ROL_PK                                                */
/*==============================================================*/
create unique index ROL_PK on ROL (
ID_ROL
);

/*==============================================================*/
/* Table: ROL_FUNCION                                           */
/*==============================================================*/
create table ROL_FUNCION (
   ID_ROL               INT4                 not null,
   ID_FUNCION           INT4                 not null,
   constraint PK_ROL_FUNCION primary key (ID_ROL, ID_FUNCION)
);

/*==============================================================*/
/* Index: ROL_FUNCION_PK                                        */
/*==============================================================*/
create unique index ROL_FUNCION_PK on ROL_FUNCION (
ID_ROL,
ID_FUNCION
);

/*==============================================================*/
/* Index: __FK                                                  */
/*==============================================================*/
create  index __FK on ROL_FUNCION (
ID_ROL
);

/*==============================================================*/
/* Index: ___FK                                                 */
/*==============================================================*/
create  index ___FK on ROL_FUNCION (
ID_FUNCION
);

/*==============================================================*/
/* Table: SESION                                                */
/*==============================================================*/
create table SESION (
   ID_SESION            SERIAL               not null,
   ID_USER              INT4                 null,
   PID                  INT4                 not null,
   constraint PK_SESION primary key (ID_SESION)
);

/*==============================================================*/
/* Index: SESION_PK                                             */
/*==============================================================*/
create unique index SESION_PK on SESION (
ID_SESION
);

/*==============================================================*/
/* Index: TIENE_FK                                              */
/*==============================================================*/
create  index TIENE_FK on SESION (
ID_USER
);

/*==============================================================*/
/* Table: "user"                                                */
/*==============================================================*/
create table "user" (
   ID_USER              SERIAL               not null,
   NOM_USER             VARCHAR(100)         not null,
   PASSSWORD            VARCHAR(10)          not null,
   constraint PK_USER primary key (ID_USER)
);

/*==============================================================*/
/* Index: USER_PK                                               */
/*==============================================================*/
create unique index USER_PK on "user" (
ID_USER
);

/*==============================================================*/
/* Table: USER_ROL                                              */
/*==============================================================*/
create table USER_ROL (
   ID_USER              INT4                 not null,
   ID_ROL               INT4                 not null,
   FECHA_FIN            DATE                 not null,
   FECHA_INICIO         DATE                 not null,
   constraint PK_USER_ROL primary key (ID_USER, ID_ROL)
);

/*==============================================================*/
/* Index: USERN_ROL_PK                                          */
/*==============================================================*/
create unique index USERN_ROL_PK on USER_ROL (
ID_USER,
ID_ROL
);

/*==============================================================*/
/* Index: RELATIONSHIP_1_FK                                     */
/*==============================================================*/
create  index RELATIONSHIP_1_FK on USER_ROL (
ID_USER
);

/*==============================================================*/
/* Index: TIENE_UN_FK                                           */
/*==============================================================*/
create  index TIENE_UN_FK on USER_ROL (
ID_ROL
);

alter table FUNCION_IU
   add constraint FK_FUNCION______FUNCION foreign key (ID_FUNCION)
      references FUNCION (ID_FUNCION)
      on delete restrict on update restrict;

alter table FUNCION_IU
   add constraint FK_FUNCION________IU foreign key (ID_IU)
      references IU (ID_IU)
      on delete restrict on update restrict;

alter table ROL_FUNCION
   add constraint FK_ROL_FUNC___ROL foreign key (ID_ROL)
      references ROL (ID_ROL)
      on delete restrict on update restrict;

alter table ROL_FUNCION
   add constraint FK_ROL_FUNC____FUNCION foreign key (ID_FUNCION)
      references FUNCION (ID_FUNCION)
      on delete restrict on update restrict;

alter table SESION
   add constraint FK_SESION_TIENE_USER foreign key (ID_USER)
      references "user" (ID_USER)
      on delete restrict on update restrict;

alter table USER_ROL
   add constraint FK_USER_ROL_ASIGNA_USER foreign key (ID_USER)
      references "user" (ID_USER)
      on delete restrict on update restrict;

alter table USER_ROL
   add constraint FK_USER_ROL_TIENE_UN_ROL foreign key (ID_ROL)
      references ROL (ID_ROL)
      on delete restrict on update restrict;

