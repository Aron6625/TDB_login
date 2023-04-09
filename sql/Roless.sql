/*==============================================================*/
/* DBMS name:      PostgreSQL 8                                 */
/* Created on:     09/04/2023 02:26:47 p. m.                    */
/*==============================================================*/


drop index ESTA_FK;

drop index COMPUTADORA_PK;

drop table COMPUTADORA;

drop index ESTADO_PK;

drop table ESTADO;

drop index FUNCION_RANGO_PK;

drop table FUNCION;

drop index ______FK;

drop index ____FK;

drop index FUNCIO_IU_PK;

drop table FUNCION_IU;

drop index INTERFACE_PK;

drop table IU;

drop index RELATIONSHIP_12_FK;

drop index ESTUDIANE_FK;

drop index DE_FK;

drop index PRESTAMO_PK;

drop table PRESTAMO;

drop index ROL_PK;

drop table ROL;

drop index ___FK;

drop index __FK;

drop index ROL_FUNCION_PK;

drop table ROL_FUNCION;

drop index __FK2;

drop index ___FK2;

drop index ROL_FUNCION2_PK;

drop table ROL_FUNCION2;

drop index TIENE_FK;

drop index SESION_PK;

drop table SESION;

drop index USER_PK;

drop table "USER";

drop index TIENE_UN_FK;

drop index RELATIONSHIP_1_FK;

drop index USERN_ROL_PK;

drop table USER_ROL;

/*==============================================================*/
/* Table: COMPUTADORA                                           */
/*==============================================================*/
create table COMPUTADORA (
   ID_COMP              SERIAL               not null,
   ID_ESTADO            INT4                 not null,
   NOMBRE_COMP          VARCHAR(100)         null,
   MARCA                VARCHAR(50)          null,
   MODELO               VARCHAR(50)          null,
   constraint PK_COMPUTADORA primary key (ID_COMP)
);

/*==============================================================*/
/* Index: COMPUTADORA_PK                                        */
/*==============================================================*/
create unique index COMPUTADORA_PK on COMPUTADORA (
ID_COMP
);

/*==============================================================*/
/* Index: ESTA_FK                                               */
/*==============================================================*/
create  index ESTA_FK on COMPUTADORA (
ID_ESTADO
);

/*==============================================================*/
/* Table: ESTADO                                                */
/*==============================================================*/
create table ESTADO (
   ID_ESTADO            SERIAL               not null,
   ESTADO               VARCHAR(50)          null,
   constraint PK_ESTADO primary key (ID_ESTADO)
);

/*==============================================================*/
/* Index: ESTADO_PK                                             */
/*==============================================================*/
create unique index ESTADO_PK on ESTADO (
ID_ESTADO
);

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
   FECHA                DATE                 not null,
   constraint PK_FUNCION_IU primary key (ID_FUNCION, ID_IU, FECHA)
);

/*==============================================================*/
/* Index: FUNCIO_IU_PK                                          */
/*==============================================================*/
create unique index FUNCIO_IU_PK on FUNCION_IU (
ID_FUNCION,
ID_IU,
FECHA
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
/* Table: PRESTAMO                                              */
/*==============================================================*/
create table PRESTAMO (
   ID_COMP              INT4                 not null,
   ID_PROFESOR_         INT4                 not null,
   ID_PRESTAMO          SERIAL               not null,
   ID_ESTUDIANTE        INT4                 not null,
   FECHA_DEVOLUCION     DATE                 null,
   FECHA_PRESTAMO       DATE                 null,
   constraint PK_PRESTAMO primary key (ID_PRESTAMO)
);

/*==============================================================*/
/* Index: PRESTAMO_PK                                           */
/*==============================================================*/
create unique index PRESTAMO_PK on PRESTAMO (
ID_PRESTAMO
);

/*==============================================================*/
/* Index: DE_FK                                                 */
/*==============================================================*/
create  index DE_FK on PRESTAMO (
ID_COMP
);

/*==============================================================*/
/* Index: ESTUDIANE_FK                                          */
/*==============================================================*/
create  index ESTUDIANE_FK on PRESTAMO (
ID_ESTUDIANTE
);

/*==============================================================*/
/* Index: RELATIONSHIP_12_FK                                    */
/*==============================================================*/
create  index RELATIONSHIP_12_FK on PRESTAMO (
ID_PROFESOR_
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
/* Table: ROL_FUNCION2                                          */
/*==============================================================*/
create table ROL_FUNCION2 (
   ID_ROL               INT4                 not null,
   ID_FUNCION           INT4                 not null,
   constraint PK_ROL_FUNCION2 primary key (ID_ROL, ID_FUNCION)
);

/*==============================================================*/
/* Index: ROL_FUNCION2_PK                                       */
/*==============================================================*/
create unique index ROL_FUNCION2_PK on ROL_FUNCION2 (
ID_ROL,
ID_FUNCION
);

/*==============================================================*/
/* Index: ___FK2                                                */
/*==============================================================*/
create  index ___FK2 on ROL_FUNCION2 (
ID_ROL
);

/*==============================================================*/
/* Index: __FK2                                                 */
/*==============================================================*/
create  index __FK2 on ROL_FUNCION2 (
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
/* Table: "USER"                                                */
/*==============================================================*/
create table "USER" (
   ID_USER              SERIAL               not null,
   NOM_USER             VARCHAR(100)         not null,
   PASSSWORD            VARCHAR(10)          not null,
   constraint PK_USER primary key (ID_USER)
);

/*==============================================================*/
/* Index: USER_PK                                               */
/*==============================================================*/
create unique index USER_PK on "USER" (
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
   constraint PK_USER_ROL primary key (ID_USER, ID_ROL, FECHA_FIN)
);

/*==============================================================*/
/* Index: USERN_ROL_PK                                          */
/*==============================================================*/
create unique index USERN_ROL_PK on USER_ROL (
ID_USER,
ID_ROL,
FECHA_FIN
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

alter table COMPUTADORA
   add constraint FK_COMPUTAD_ESTA_ESTADO foreign key (ID_ESTADO)
      references ESTADO (ID_ESTADO)
      on delete restrict on update restrict;

alter table FUNCION_IU
   add constraint FK_FUNCION______FUNCION foreign key (ID_FUNCION)
      references FUNCION (ID_FUNCION)
      on delete restrict on update restrict;

alter table FUNCION_IU
   add constraint FK_FUNCION________IU foreign key (ID_IU)
      references IU (ID_IU)
      on delete restrict on update restrict;

alter table PRESTAMO
   add constraint FK_PRESTAMO_DE_COMPUTAD foreign key (ID_COMP)
      references COMPUTADORA (ID_COMP)
      on delete restrict on update restrict;

alter table PRESTAMO
   add constraint FK_PRESTAMO_ESTUDIANE_USER foreign key (ID_ESTUDIANTE)
      references "USER" (ID_USER)
      on delete restrict on update restrict;

alter table PRESTAMO
   add constraint FK_PRESTAMO_RELATIONS_USER foreign key (ID_PROFESOR_)
      references "USER" (ID_USER)
      on delete restrict on update restrict;

alter table ROL_FUNCION
   add constraint FK_ROL_FUNC__2_ROL foreign key (ID_ROL)
      references ROL (ID_ROL)
      on delete restrict on update restrict;

alter table ROL_FUNCION
   add constraint FK_ROL_FUNC___2_FUNCION foreign key (ID_FUNCION)
      references FUNCION (ID_FUNCION)
      on delete restrict on update restrict;

alter table ROL_FUNCION2
   add constraint FK_ROL_FUNC___FUNCION foreign key (ID_FUNCION)
      references FUNCION (ID_FUNCION)
      on delete restrict on update restrict;

alter table ROL_FUNCION2
   add constraint FK_ROL_FUNC____ROL foreign key (ID_ROL)
      references ROL (ID_ROL)
      on delete restrict on update restrict;

alter table SESION
   add constraint FK_SESION_TIENE_USER foreign key (ID_USER)
      references "USER" (ID_USER)
      on delete restrict on update restrict;

alter table USER_ROL
   add constraint FK_USER_ROL_ASIGNA_USER foreign key (ID_USER)
      references "USER" (ID_USER)
      on delete restrict on update restrict;

alter table USER_ROL
   add constraint FK_USER_ROL_TIENE_UN_ROL foreign key (ID_ROL)
      references ROL (ID_ROL)
      on delete restrict on update restrict;

